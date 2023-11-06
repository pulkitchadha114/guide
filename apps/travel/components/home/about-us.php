<section class="about-us p-0">
        <div class="container">
            <div class="about-image-box">
                <div class="row d-flex align-items-center justify-content-between">
                    <div class="col-lg-5 mb-4 pe-lg-4">
                        <div class="form-main mt-minus">
                            <div class="form-content rounded overflow-hidden">
                                <h3 class="form-title text-center p-3 white bg-theme mb-0 rounded-top">
                                <?php echo lang("home")->find_a_place; ?>
                                </h3>
                                <div class="book-form px-4 py-5">
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <select class="niceSelect">
                                                <option value="1"><?php echo lang("home")->destination; ?></option>
                                                <option value="2"><?php echo lang("home")->marrakech; ?></option>
                                                <option value="4"><?php echo lang("home")->casablanca; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <input type="date" name="date" />
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <select class="niceSelect">
                                                <option value="1"><?php echo lang("home")->travel_type; ?></option>
                                                <option value="2"><?php echo lang("home")->city_tour; ?></option>
                                                <option value="3"><?php echo lang("home")->family_tour; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <div class="input-box">
                                            <select class="niceSelect">
                                                <option value="1"><?php echo lang("home")->tour_duration; ?></option>
                                                <option value="2"><?php echo lang("home")->five_days; ?></option>
                                                <option value="3"><?php echo lang("home")->seven_days; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group text-center">
                                        <a href="#" class="nir-btn w-100"><i class="fa fa-search mr-2"></i> <?php echo lang("home")->search_now; ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 mb-4 ps-lg-4">
                        <div class="about-content text-center text-lg-start mb-4 mt-10">
                            <h4 class="theme d-inline-block mb-0"><?php echo lang("home")->know_heading; ?></h4>
                            <h2><?php echo lang("home")->know_title; ?></h2>
                            <p class="border-b mb-2 pb-2">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                            </p>
                            <div class="about-listing">
                                <ul class="d-flex justify-content-between">
                                    <li><i class="icon-location-pin theme"></i> <?php echo lang("home")->tour_guide; ?></li>
                                    <li><i class="icon-briefcase theme"></i> <?php echo lang("home")->friendly_price; ?></li>
                                    <li>
                                        <i class="icon-folder theme"></i> <?php echo lang("home")->reliable_tour_package; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="white-overlay"></div>
    </section>