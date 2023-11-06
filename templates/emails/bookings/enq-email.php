<?php
$ctx = $context;
$dbobj = obj($context);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Information</title>
    <!-- Add Bootstrap CSS (You can link to a CDN or include it locally) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add your custom CSS for styling -->
    <style>
        /* Add your custom CSS here */
        body {
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #e1e1e1;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .btn-reset {
            background-color: #007bff;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="container email-container">
            <h1>Booking Enquiry</h1>
            <p><b>Name:</b> <?php echo $ctx->first_name; ?></p>
            <p><b>Email:</b> <?php echo $ctx->email; ?></p>
            <p><b>Mobile:</b> <?php echo $ctx->mobile; ?></p>
            <p><b>Address :</b> <?php echo $ctx->address; ?></p>
            <p><b>Booking Date:</b> <?php echo $ctx->booking_date; ?></p>
            <p><b>People:</b> <?php echo $ctx->people; ?></p>

           <small><a href="<?php echo BASEURI; ?>"><?php echo SITE_NAME; ?></a></small>
    </div>
</body>

</html>
