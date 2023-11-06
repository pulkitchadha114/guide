<?php

use PHPMailer\PHPMailer\PHPMailer;

class Travel_booking_ctrl extends Main_ctrl
{
    public function index($req=null)
    {
        $req = obj($req);
          
        $meta_tags = "";
        $meta_desc = "";
        
        if (isset($req->pkgid)) {
            $pkg = $this->get_pckage_details($req->pkgid);
        }

        $GLOBALS['meta_seo'] = (object) array('title' => 'Booking', 'description' =>'Book you tour here', 'keywords' => 'booking, book now, travel booking');
        $context = (object) array(
            'page'=>'booking.php',
            'data' => (object) array(
                'req' => obj($req),
                'pkg' => $pkg??null
            )
        );
        $this->render_layout($context);
    }
    function get_pckage_details($id){
        $db = new Dbobjects;
        return $db->showOne("select * from content where content.id = $id and content_group='package'");
    }

    function send_email($req = null)
    {
        $req = obj($_POST);
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'country_code' => 'required|numeric',
            'mobile' => 'required|numeric',
            'address1' => 'required|string',
            'address2' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'pkgid' => 'required|numeric',
            'adults' => 'required|numeric',
            'booking_date' => 'required|date',
            'email' => 'required|email',
        ];
        $req->children = $req->children??"0";
        $req->booking_date = date("Y-m-d H:i:s",strtotime($req->booking_date));
        $pass = validateData(data: $_POST, rules: $rules);
        if (!$pass) {
            $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
            $data['success'] = false;
            $data['data'] = null;
            echo json_encode($data);
            return;
        }
        if (!email_has_valid_dns($req->email)) {
            msg_set("Please provide valid email address");
            $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
            $data['success'] = false;
            $data['data'] = null;
            echo json_encode($data);
            return;
        }
        $pkg = obj($this->get_pckage_details($req->pkgid));
        $amt = $req->adults * $pkg->price;
       
        if ($amt <= 0) {
            msg_set("Invalid amount");
            $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
            $data['success'] = false;
            $data['data'] = null;
            echo json_encode($data);
            return;
        }
        try {
            $req->pkg = $pkg;
            $req->pkg->amt = $amt;
            $mail = php_mailer(new PHPMailer());
            $mail->setFrom(email, SITE_NAME . " Booking");
            $mail->isHTML(true);
            $mail->Subject = 'Booking request';
            $body = render_template('emails/bookings/request-email.php',$req);
            $mail->Body = $body;
            $mail->addAddress($req->email, "$req->email");
            $mail->addAddress("contact@needguidemorocco.com", "$req->email");
           
            if ($mail->send()) {
                msg_set('Email sent successfully successfully');
                $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
                $data['success'] = true;
                $data['data'] = null;
                echo json_encode($data);
                return;
            }
            else {
                msg_set("Email not sent");
                $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
                $data['success'] = false;
                $data['data'] = null;
                echo json_encode($data);
                return;
            }
        } catch (\Throwable $th) {
            msg_set("Something went wrong");
            $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
            $data['success'] = false;
            $data['data'] = null;
            echo json_encode($data);
            return;
        }
    }
    function send_enq_email($req = null)
    {
        $req = obj($_POST);
        $rules = [
            'name' => 'required|string',
            'mobile' => 'required|numeric',
            'address' => 'required|string',
            'people' => 'required|numeric',
            'booking_date' => 'required|date',
            'email' => 'required|email',
        ];
        $req->booking_date = date("Y-m-d H:i:s",strtotime($req->booking_date));
        $pass = validateData(data: $_POST, rules: $rules);
        if (!$pass) {
            $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
            $data['success'] = false;
            $data['data'] = null;
            echo json_encode($data);
            return;
        }
        if (!email_has_valid_dns($req->email)) {
            msg_set("Please provide valid email address");
            $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
            $data['success'] = false;
            $data['data'] = null;
            echo json_encode($data);
            return;
        }
        try {
            $mail = php_mailer(new PHPMailer());
            $mail->setFrom(email, SITE_NAME . " Booking Enquiry");
            $mail->isHTML(true);
            $mail->Subject = 'Booking request';
            $body = render_template('emails/bookings/enq-email.php',$req);
            $mail->Body = $body;
            $mail->addAddress($req->email, "$req->email");
            $mail->addAddress("contact@needguidemorocco.com", "$req->email");
           
            if ($mail->send()) {
                msg_set('Email sent successfully');
                $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
                $data['success'] = true;
                $data['data'] = null;
                echo json_encode($data);
                return;
            }
            else {
                msg_set("Email not sent");
                $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
                $data['success'] = false;
                $data['data'] = null;
                echo json_encode($data);
                return;
            }
        } catch (\Throwable $th) {
            msg_set("Something went wrong");
            $data['msg'] = msg_ssn(return: true, lnbrk: "<br>");
            $data['success'] = false;
            $data['data'] = null;
            echo json_encode($data);
            return;
        }
    }
}
