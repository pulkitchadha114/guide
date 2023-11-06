<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Need Guide - Travel Tour Booking</title>

    <link rel="shortcut icon" type="image/x-icon" href="/<?php echo STATIC_URL; ?>/tour/assetsimages/favicon.png" />

    <link href="/<?php echo STATIC_URL; ?>/tour/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="/<?php echo STATIC_URL; ?>/tour/assets/css/style.css" rel="stylesheet" type="text/css" />

    <link href="/<?php echo STATIC_URL; ?>/tour/assets/css/plugin.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <link rel="stylesheet" href="/<?php echo STATIC_URL; ?>/tour/assets/fonts/line-icons.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.27/dist/sweetalert2.all.min.js"></script>
    <script>
        function swalert(obj) {
            Swal.fire(
                obj.title,
                obj.msg,
                obj.icon
            ).then(() => {
                if (obj.gotoLink) {
                    window.location.href = obj.gotoLink;
                }
            })
        }

        function commonCallbackHandler(res) {
            if (res.success === true) {
                swalert({
                    title: 'Success',
                    msg: res.msg,
                    icon: 'success'
                });
                // location.reload();
            } else if (res.success === false) {
                swalert({
                    title: 'Failed',
                    msg: res.msg,
                    icon: 'error'
                });
            } else {
                swalert({
                    title: 'Failed',
                    msg: 'Something went wrong',
                    icon: 'error'
                });
            }
        }
    </script>
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- WhatsApp icon -->
    <a href="https://wa.me/+212661292350" class="whatsapp-icon" target="_blank">
        <img src="/<?php echo STATIC_URL; ?>/tour/assets/images/whatsapp.png" alt="WhatsApp Icon">
    </a>

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3 mt-3">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <a href="/<?php echo home; ?>"><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/main-logo.jpg" width="200px" alt="" srcset=""></a>
            <?php if (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') : ?>
                <a id="set-lang-ru" class="nav-link scrollto pk-pointer"><?php echo lang("nav")->ru ?? "Ru"; ?></a>
            <?php else : ?>
                <a id="set-lang-en" class="nav-link scrollto pk-pointer"><?php echo lang("nav")->en ?? "En"; ?></a>
            <?php endif; ?>

            <input type="hidden" class="lang" name="lang" value="">
            <div id="res-lang"></div>
            <?php
            pkAjax("#set-lang-en", route('setLang', ['lang' => 'en']), ".lang", "#res-lang");
            pkAjax("#set-lang-ru", route('setLang', ['lang' => 'ru']), ".lang", "#res-lang");
            ?>
            <button class=" navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/<?php echo home . route('home'); ?>"><?php echo lang("nav")->home; ?></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/<?php echo home . route('tours'); ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo lang("nav")->tours; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            $userObj = new Model('content');
                            $pack_cat = $userObj->filter_index(array('content_group' => 'product_category', 'is_active' => 1));
                            // print_r($pack_cat);

                            ?>
                            <?php
                            foreach ($pack_cat as $key => $pkg) :
                                $pkg = obj($pkg);
                            ?>
                                <li><a class="dropdown-item" href=""><?php echo pk_excerpt($pkg->title, 20); ?></a></li>
                            <?php endforeach;
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo lang("nav")->excursions; ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/<?php echo home . route('tripOne'); ?>">Trips From Marrakech</a></li>
                            <li><a class="dropdown-item" href="/<?php echo home . route('tripSecond'); ?>">Trips From Casablanca</a></li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/<?php echo home . route('services'); ?>"><?php echo lang("nav")->services; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/<?php echo home . route('aboutUs'); ?>"><?php echo lang("nav")->about; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?php echo lang("nav")->partners; ?></a>
                    </li>

                </ul>

                <div class="register-login d-flex align-items-center">


                    <?php
                    /* if (USER) : ?>
                                <a href="/<?php echo home . route('logout'); ?>" class="me-3">
                                    <i class="icon-user"></i> Logout
                                </a>
                            <?php else : ?>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="me-3">
                                    <i class="icon-user"></i> <?php echo lang("nav")->login; ?>/<?php echo lang("nav")->register; ?>
                                </a>
                            <?php endif; */
                    ?>
                    <a href="#" class="nir-btn white"><?php echo lang("nav")->book; ?></a>
                </div>

            </div>
        </div>
    </nav>



    <?php import("apps/travel/pages/{$context->page}", $context); ?>
    <footer class="pt-20 pb-4" style="background-image: url(/<?php echo STATIC_URL; ?>/images/background_pattern.png)">
        <div class="section-shape top-0" style="background-image: url(/<?php echo STATIC_URL; ?>/images/shape8.png)"></div>

        <div class="insta-main pb-10">
            <div class="container">
                <div class="insta-inner">
                    <div class="follow-button">
                        <h5 class="m-0 rounded">
                            <i class="fab fa-instagram"></i> Follow on Instagram
                        </h5>
                    </div>
                    <div class="row attract-slider">
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href=""><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/insta/ins-3.jpg" alt="insta" /></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href=""><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/insta/ins-4.jpg" alt="insta" /></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href=""><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/insta/ins-5.jpg" alt="insta" /></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href=""><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/insta/ins-1.jpg" alt="insta" /></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href=""><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/insta/ins-7.jpg" alt="insta" /></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href=""><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/insta/ins-8.jpg" alt="insta" /></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href=""><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/insta/ins-2.jpg" alt="insta" /></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href=""><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/insta/ins-6.jpg" alt="insta" /></a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="insta-image rounded">
                                <a href=""><img src="/<?php echo STATIC_URL; ?>/tour/assets/images/insta/ins-9.jpg" alt="insta" /></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-upper pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4 pe-4">
                        <div class="footer-about">
                            <img src="images/logo-header.png" alt />
                            <p class="mt-3 mb-3 white">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Odio
                                suspendisse leo neque iaculis molestie sagittis maecenas
                                aenean eget molestie sagittis.
                            </p>
                            <ul>
                                <li class="white">
                                    <strong>PO Box:</strong> +212661292350
                                </li>
                                <li class="white">
                                    <strong>Location:</strong> Lorem Ipsum, dolor, semit
                                </li>
                                <li class="white">
                                    <strong>Email:</strong>
                                    <a href="mailto:contact@needguidemorocco.com" class="__cf_email__">contact@needguidemorocco.com</a>
                                </li>
                                <li class="white">
                                    <strong>Website:</strong>www.NeedGuide.com
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-4">
                        <div class="footer-links">
                            <h3 class="white">Quick link</h3>
                            <ul>
                                <li><a href="">About Us</a></li>
                                <li><a href="">Delivery Information</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Terms &amp; Conditions</a></li>
                                <li><a href="">Customer Service</a></li>
                                <li><a href="">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-12 mb-4">
                        <div class="footer-links">
                            <h3 class="white">Categories</h3>
                            <ul>
                                <li><a href="">Travel</a></li>
                                <li><a href="">Technology</a></li>
                                <li><a href="">Lifestyle</a></li>
                                <li><a href="">Destinations</a></li>
                                <li><a href="">Entertainment</a></li>
                                <li><a href="">Business</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="footer-links">
                            <h3 class="white">Newsletter</h3>
                            <div class="newsletter-form">
                                <p class="mb-3">
                                    Join our community of over 200,000 global readers who
                                    receives emails filled with news, promotions, and other good
                                    stuff.
                                </p>
                                <form action="#" method="get" accept-charset="utf-8" class="border-0 d-flex align-items-center">
                                    <input type="text" placeholder="Email Address" />
                                    <button class="nir-btn ms-2">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-copyright">
            <div class="container">
                <div class="copyright-inner rounded p-3 d-md-flex align-items-center justify-content-between">
                    <div class="copyright-text">
                        <p class="m-0 white">2023 Need Guide. All rights reserved. Designed & Developed By Web Art Vision.</p>
                    </div>
                    <div class="social-links">
                        <ul>
                            <li>
                                <a href="https://m.facebook.com/profile.php/?id=1159271047"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/ru_guide_morocco/"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    </footer>

    <div id="back-to-top">
        <a href="#"></a>
    </div>

    <div id="search1">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" value placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>

    <div class="modal fade log-reg" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="post-tabs">
                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button aria-controls="login" aria-selected="false" class="nav-link active" data-bs-target="#login" data-bs-toggle="tab" id="login-tab" role="tab" type="button">
                                    Login
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button aria-controls="register" aria-selected="true" class="nav-link" data-bs-target="#register" data-bs-toggle="tab" id="register-tab" role="tab" type="button">
                                    Register
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content blog-full" id="postsTabContent">
                            <div aria-labelledby="login-tab" class="tab-pane fade active show" id="login" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="blog-image rounded">
                                            <a href="#" style="
                            background-image: url(/<?php echo STATIC_URL; ?>/tour/assets/images/trending/trending5.jpg);
                          "></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="text-center border-b pb-2">Login</h4>
                                        <div class="log-reg-button d-flex align-items-center justify-content-between">
                                            <button type="submit" class="btn btn-fb">
                                                <i class="fab fa-facebook"></i> Login with Facebook
                                            </button>
                                            <button type="submit" class="btn btn-google">
                                                <i class="fab fa-google"></i> Login with Google
                                            </button>
                                        </div>
                                        <hr class="log-reg-hr position-relative my-4 overflow-visible" />
                                        <div id="res"></div>
                                        <form method="post" action="/<?php echo home . route('userLoginAjax'); ?>" name="contactform" id="contactform">
                                            <div class="form-group mb-2">
                                                <input type="text" name="username" class="form-control" id="fname" placeholder="User Name or Email Address" />
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="password" name="password" class="form-control" id="lpass" placeholder="Password" />
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="checkbox" class="custom-control-input" id="exampleCheck" />
                                                <label class="custom-control-label mb-0" for="exampleCheck1">Remember
                                                    me</label>
                                                <a class="float-end" href="#">Lost your password?</a>
                                            </div>
                                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                                <button type="submit" class="nir-btn w-100" id="login-btn">Login</button>
                                            </div>
                                            <p class="text-center">
                                                Don't have an account?
                                                <a href="#" class="theme">Register</a>
                                            </p>
                                        </form>
                                        <?php

                                        pkAjax_form("#login-btn", "#contactform", "#res");

                                        ?>
                                    </div>
                                </div>
                            </div>

                            <div aria-labelledby="register-tab" class="tab-pane fade" id="register" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="blog-image rounded">
                                            <a href="#" style="
                            background-image: url(/<?php echo STATIC_URL; ?>/tour/assets/images/trending/trending5.jpg);
                          "></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h4 class="text-center border-b pb-2">Register</h4>
                                        <div class="log-reg-button d-flex align-items-center justify-content-between">
                                            <button type="submit" class="btn btn-fb">
                                                <i class="fab fa-facebook"></i> Login with Facebook
                                            </button>
                                            <button type="submit" class="btn btn-google">
                                                <i class="fab fa-google"></i> Login with Google
                                            </button>
                                        </div>
                                        <hr class="log-reg-hr position-relative my-4 overflow-visible" />
                                        <div id="res1"></div>
                                        <form method="post" action="/<?php echo home . route('registerAjax'); ?>" id="reg-form">
                                            <div class="form-group mb-2">
                                                <input type="text" name="username" class="form-control" id="fname1" placeholder="User Name" />
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="text" name="email" class="form-control" id="femail" placeholder="Email Address" />
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="password" name="password" class="form-control" id="lpass1" placeholder="Password" />
                                            </div>
                                            <div class="form-group mb-2">
                                                <input type="password" name="confirm_password" class="form-control" id="lrepass" placeholder="Re-enter Password" />
                                            </div>
                                            <div class="form-group mb-2 d-flex">
                                                <input type="checkbox" class="custom-control-input" id="exampleCheck1" />
                                                <label class="custom-control-label mb-0 ms-1 lh-1" for="exampleCheck1">I
                                                    have read and accept the Terms and Privacy
                                                    Policy?</label>
                                            </div>
                                            <div class="comment-btn mb-2 pb-2 text-center border-b">
                                                <button type="submit" class="nir-btn w-100" id="reg-btn">Register</button>
                                            </div>
                                            <p class="text-center">
                                                Already have an account?
                                                <a href="#" class="theme">Login</a>
                                            </p>
                                        </form>
                                        <?php
                                        pkAjax_form("#reg-btn", "#reg-form", "#res1");
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!--<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>-->

    <script src="/<?php echo STATIC_URL; ?>/tour/assets/js/bootstrap.min.js"></script>
    <script src="/<?php echo STATIC_URL; ?>/tour/assets/js/particles.js"></script>
    <script src="/<?php echo STATIC_URL; ?>/tour/assets/js/particlerun.js"></script>
    <script src="/<?php echo STATIC_URL; ?>/tour/assets/js/plugin.js"></script>
    <script src="/<?php echo STATIC_URL; ?>/tour/assets/js/main.js"></script>
    <script src="/<?php echo STATIC_URL; ?>/tour/assets/js/custom-swiper.js"></script>
    <script src="/<?php echo STATIC_URL; ?>/tour/assets/js/custom-nav.js"></script>
</body>

</html>