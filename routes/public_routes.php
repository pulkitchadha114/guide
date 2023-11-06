<?php
$public_routes = [
    "" => "Travel_home_ctrl@index@name.home",
    "/" => "Travel_home_ctrl@index@name.homeSlash",
    "/fetch-packages-by-cat-id-ajax" => "Travel_home_ctrl@fetch_packages_by_catid@name.fetchPkgAjax",
    "/about-us" => "Travel_about_ctrl@index@name.aboutUs",
    "/visa" => "Travel_visa_ctrl@index@name.visa",
    "/tours" => "Travel_tours_ctrl@index@name.tours",
    "/trips-from-marrakech" => "Travel_excursion_ctrl@index@name.tripOne",
    "/trips-from-casablanca" => "Travel_excursion_second_ctrl@index@name.tripSecond",
    "/services" => "Travel_services_ctrl@index@name.services",
    "/contact" => "Travel_contact_ctrl@index@name.contact",
    "/booking/{pkgid}" => "Travel_booking_ctrl@index@name.booking",
    // Excursions Inside Pages
    "/1-day-trip-to-ait-ben-haddou-kasbah-from-marrakech" => "Travel_first_trip_ctrl@index@name.firstTrip",
    "/1-day-trip-to-essaouira-from-marrakech" => "Travel_second_trip_ctrl@index@name.secondTrip",
    "/1-day-trip-to-ourika-valley-from-marrakech" => "Travel_third_trip_ctrl@index@name.thirdTrip",
    "/1-day-trip-to-ouzoud-waterfalls-from-marrakech" => "Travel_fourth_trip_ctrl@index@name.fourthTrip",
    "/1-day-trip-to-chefchaouen-from-casablanca" => "Travel_fifth_trip_ctrl@index@name.fifthTrip",
    "/1-day-trip-to-marrakech-from-casablanca" => "Travel_sixth_trip_ctrl@index@name.sixthTrip",
    "/1-day-trip-to-rabat-from-casablanca" => "Travel_seventh_trip_ctrl@index@name.seventhTrip",
    "/save-trip" => "Travel_excursion_ctrl@save@name.tripAjax",
    "/request-booking" => "Travel_booking_ctrl@send_email@name.sendRequestForBookingApi",
];
