<?php
include 'functions/functions.php';
include 'functions/Effects.php';
include 'functions/CONFIG.php';

include 'tpl/header.html';

if (!session_id()) {session_start();}
$path = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';

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
//		$login = $_POST['login'];
//        $password = md5($_POST['password']);
//        login($connect, $login, $password);
        break;
    case '/preset/effect/base/1':
        $image = new Imagick(PATH_TO_UPLOADS  . $_SESSION['edit_name_image']);
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
        $image->compositeImage($noise, imagick::COMPOSITE_MULTIPLY, 0, 0, imagick::CHANNEL_DEFAULT);
        unlink(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image']);
        if (!isset($_SESSION['counter_modified_image'])) {
            $_SESSION['counter_modified_image'] = 1;
        } else {
            $_SESSION['counter_modified_image']++;
        }
        $image->writeImage(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image']);
        $image->writeImage(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        break;
    case '/preset/effect/base/2':
        $image = new Imagick(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        $image->contrastImage(-10);
        $image->modulateImage(100,0, 100);
        $image->levelImage(0, 1.5, 65535);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.3);
        $noise->modulateImage(100,0, 100);
        $image->compositeImage($noise, imagick::COMPOSITE_MULTIPLY, 0, 0, imagick::CHANNEL_DEFAULT);
        unlink(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image']);
        if (!isset($_SESSION['counter_modified_image'])) {
            $_SESSION['counter_modified_image'] = 1;
        } else {
            $_SESSION['counter_modified_image']++;
        }
        $image->writeImage(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image']);
        $image->writeImage(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        break;

    case '/cancel':
        unlink(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image']);
        unlink(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        unlink(PATH_TO_UPLOADS . $_SESSION['name_image']);
        break;
    case preg_match("#^/uploads/image/(?P<name_image>.+)$#", $path, $tmp):
        header('content-type: image/jpeg');
        $name_image = $tmp['name_image'];
        break;
    case '/download/image':
        // Копирование видоизменнёного файла в уже готовый к скачке файл
        copy("upload/" . $_SESSION['edit_name_image'], "upload/" . $_SESSION['name_image']);
        // Имя скачиваемого файла
        $file = "upload/" . $_SESSION['name_image'];
        // Контент-тип означающий скачивание
        header("Content-Type: application/octet-stream");
        // Размер в байтах
        header("Accept-Ranges: bytes");
        // Размер файла
        header("Content-Length: ".filesize($file));
        // Расположение скачиваемого файла
        header("Content-Disposition: attachment; filename=".$file);
        // Прочитать файл
        readfile($file);
        break;
    default:
        include "tpl/main.html";
        break;
}
header('Cache-Control: max-age=3600, must-revalidate');
include "tpl/footer.html";