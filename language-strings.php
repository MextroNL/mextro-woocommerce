<?php

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

//Declare Variable as Global
global $about;
global $gallery;
global $about_link;
global $return_home;
global $error_message;
global $blog_error;

if (strpos($url,'/en/') !== false) {
    //English Strings
    $about = "Read more";
    $gallery = "Gallery";
    $about_link = "about";
    $return_home = "Click here to return to the Home page.";
    $error_message = "The requested page could not be found.";

} else {
    //Dutch Strings
    $about = "En savoir";
    $gallery = "Gallerie";
    $about_link = "pro-tect";
    $return_home = "Klik hier om terug te gaan naar de Home pagina.";
    $error_message = "De opgevraagde pagina kon niet worden gevonden!";
    $blog_error = "Il n'y a pas encore de nouvelles.";
}
