<?php
$pd = $context->data;
// myprint($pd);
?>
<section class="breadcrumb-main pb-20 pt-14" style="background-image: url(/<?php echo MEDIA_URL; ?>/images/pages/<?php echo $pd->banner; ?>);">
    <div class="section-shape section-shape1 top-inherit bottom-0" style="background-image: url(/<?php echo STATIC_URL;  ?>/tour/assets/images/shape8.png);"></div>
    <div class="breadcrumb-outer">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h1 class="mb-3">
                <?php if (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') : ?>
                                            <?php echo !empty($pd->title) ? $pd->title : ''; ?>
                                        <?php else : ?>
                                            <?php echo !empty($pd->title_ru) ? $pd->title_ru : ''; ?>
                                        <?php endif; ?> 
                                    </h1>
                <nav aria-label="breadcrumb" class="d-block">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php if (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') : ?>
                                            <?php echo !empty($pd->title) ? $pd->title : ''; ?>
                                        <?php else : ?>
                                            <?php echo !empty($pd->title_ru) ? $pd->title_ru : ''; ?>
                                        <?php endif; ?></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <div class="dot-overlay"></div>
</section>


<section class="trending pt-6 pb-0 bg-lgrey overflow-hidden">
    <!-- <div class="tabs-navbar1 bg-white sticky1 bordernone py-3">
        <ul id="tabs" class="nav nav-tabs bordernone mb-0 overflow-visible">
            <li class="active"><a data-toggle="tab" href="#highlight">Highlight</a></li>
            <li><a data-toggle="tab" href="#iternary">Iternary</a></li>
            <li><a data-toggle="tab" href="#single-map">Map</a></li>
            <li><a data-toggle="tab" href="#single-comments">Comments</a></li>
            <li><a data-toggle="tab" href="#single-add-review" class="bordernone">Add Reviews</a></li>
        </ul>
    </div> -->
    <div class="container">
        <div class="single-content">
            <div id="highlight">
                <div class="single-full-title border-b mb-2 pb-2">
                    <div class="single-title text-center">
                        <h2 class="mb-1"><?php if (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') : ?>
                                            <?php echo !empty($pd->title) ? $pd->title : ''; ?>
                                        <?php else : ?>
                                            <?php echo !empty($pd->title_ru) ? $pd->title_ru : ''; ?>
                                        <?php endif; ?></h2>
                        <div class="rating-main">
                            <!-- <p class="mb-0 me-2 d-inline-block"><i class="icon-location-pin"></i> Greater London, United Kingdom</p>
                            <div class="rating me-2 d-inline-block">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                            </div>
                            <span>(1,186 Reviews)</span> -->
                        </div>
                    </div>
                </div>
                <div class="description-assets/images mb-4">
                    <div class="row">
                        <?php
                        $imgs = get_image_list($pd->imgs);
                        foreach ($imgs as $key => $img) { ?>
                            <div class="col"><img style="width:100%; height:300px; object-fit:cover;" src="/<?php echo MEDIA_URL; ?>/images/pages/<?php echo $img; ?>" alt="<?php echo $pd->title; ?>" class="rounded"></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="description mb-2">
                    <h4>Description</h4>
                    <?php if (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') : ?>
                                            <?php echo !empty($pd->content) ? $pd->content : ''; ?>
                                        <?php else : ?>
                                            <?php echo !empty($pd->content_ru) ? $pd->content_ru : ''; ?>
                                        <?php endif; ?>
                </div>
                <div class="tour-includes mb-4">
                    <table>
                        <tbody>
                            <tr>
                                <td><i class="fa fa-clock-o pink mr-1" aria-hidden="true"></i> <?php echo $pd->days; ?> Days</td>
                                <td><i class="fa fa-group pink mr-1" aria-hidden="true"></i> Max People : <?php echo $pd->max_people; ?></td>
                                <td><i class="fa fa-money pink mr-1" aria-hidden="true"></i>Price: <?php echo $pd->price; ?> Euro</td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-user pink mr-1" aria-hidden="true"></i> Min Age : <?php echo $pd->min_age; ?>+</td>
                                <td><i class="fa fa-map-signs pink mr-1" aria-hidden="true"></i> Pickup : 
                                <?php if (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') : ?>
                                            <?php echo !empty($pd->pickup) ? $pd->pickup : ''; ?>
                                        <?php else : ?>
                                            <?php echo !empty($pd->pickup_ru) ? $pd->pickup_ru : ''; ?>
                                        <?php endif; ?>
                            </td>
                                <td><i class="fa fa-file-alt pink mr-1" aria-hidden="true"></i> Langauge - 
                                <?php if (isset($_COOKIE['lang']) && $_COOKIE['lang'] == 'en') : ?>
                                            <?php echo !empty($pd->languages) ? $pd->languages : ''; ?>
                                        <?php else : ?>
                                            <?php echo !empty($pd->languages_ru) ? $pd->languages_ru : ''; ?>
                                        <?php endif; ?>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="description mb-4">

                    <div style="padding: 20px;">
                        <a href="<?php echo BASEURI . route('booking',['pkgid'=>$pd->id]); ?>"><button type="button" class="btn btn-primary">Book Now</button></a>
                        <button type="button" class="btn btn-danger">Euro <?php echo $pd->price; ?></button>
                        <div>
                        </div>
                    </div>

                </div>
                <div id="single-map" class="single-map mb-4">
                    <h4>Map</h4>
                    <div class="map rounded overflow-hidden">
                        <div style="width: 100%">
                            <iframe class=" rounded overflow-hidden" height="400" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=+(mangal%20bazar)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div>





            </div>
        </div>
</section>


<section class="discount-action pt-0" style="background-image:url(/<?php echo STATIC_URL;  ?>/tour/assets/images/section-bg1.png); background-position:center;">
    <div class="container">
        <div class="call-banner rounded pt-10 pb-14">
            <div class="call-banner-inner w-75 mx-auto text-center px-5">
                <div class="trend-content-main">
                    <div class="trend-content mb-5 pb-2 px-5">
                        <h5 class="mb-1 theme">Love Where Your're Going</h5>
                        <h2><a href="detail-fullwidth.php">Explore Your Life, <span class="theme1"> Travel Where You Want!</span></a></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                    <div class="video-button text-center position-relative">
                        <div class="call-button text-center">
                            <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo">
                                <i class="fa fa-play bg-blue"></i>
                            </button>
                        </div>
                        <div class="video-figure"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="white-overlay"></div>
    <div class="white-overlay"></div>
    <div class="section-shape  top-inherit bottom-0" style="background-image: url(/<?php echo STATIC_URL;  ?>/tour/assets/images/shape6.png);"></div>
</section>