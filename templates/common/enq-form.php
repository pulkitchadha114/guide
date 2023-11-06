
<form id="confirmform" method="post" action="<?php echo BASEURI . route('sendEnqForBookingApi'); ?>">
    <div class="row mb-2">
        <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Full name*" aria-label="Name">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <input type="email" name="email" class="form-control" placeholder="E-mail*" aria-label="Email">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <input type="number" name="mobile" class="form-control" placeholder="Phone*" aria-label="First name">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <input type="text" name="address" class="form-control" placeholder="Address*" aria-label="First name">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <input type="date" name="booking_date" class="form-control" placeholder="Date*" aria-label="Date">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <input type="text" name="people" class="form-control" placeholder="People*" aria-label="People">
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <textarea name="message" cols="30" rows="10">Message</textarea>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <button id="send-enq-btn" type="button" class="nir-btn white">Book Now</button>
        </div>
    </div>
</form>
<?php
send_to_server("#send-enq-btn","#confirmform","commonCallbackHandler");
?>