<?php
include 'functions/functions.php';
include 'functions/Effects.php';

include 'tpl/header.html';

$editing_file_path_name = '';
$file_name = '';
$path = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
$path_to_image = 'C:/xampp/htdocs/';
if (isset($_COOKIE['counter'])) {
    $_COOKIE['counter'] += 1;
} else {
    setcookie("counter", 0, time()+86400, '/');
}
switch ($path){
    case "/":
        include "tpl/main.html";
        break;
    case "/description":
        include "tpl/description.html";
        break;
    case "/possibility":
        include "tpl/possibility.html";
        break;
    case "/album":
        include "tpl/album.html";
        break;
    case "/upload/image" :
        upload_image();
        break;
    case "/login":
        include "tpl/login_form.html";
		$login = $_POST['login'];
        $password = md5($_POST['password']);
        login($connect, $login, $password);
        break;
    case '/preset/effect/base/1':
        $image = new Imagick($path_to_image . $_COOKIE['edit_name_image']);
        $image->contrastImage(-10);
        $image->modulateImage(100,130, 100);
        $image->levelImage(0, 1.5, 65535);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.3);
        $noise->modulateImage(100,0, 100);
        $noise->writeImage($path_to_image . 'noise.png');
        $image->compositeImage($noise, imagick::COMPOSITE_MULTIPLY, 0, 0, imagick::CHANNEL_DEFAULT);
        $image->writeImage($path_to_image . $_COOKIE['edit_name_image']);
        break;
    case '/preset/effect/base/2':
        $effect = new Effects();
        $effect->effect_base_2($path_to_image, $editing_file_path_name);
        break;
    case preg_match("#^/uploads/image/(?P<name_image>.+)$#", $path, $tmp):
        header('content-type: image/jpeg');
        $name_image = $tmp['name_image'];
        echo '<img src="/uploads/'. $name_image. '">';
        break;
}
header('Cache-Control: max-age=3600, must-revalidate');
include "tpl/footer.html";