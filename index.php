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
        $image = new Effects();
        $image->base_1_effect_1();
        break;
    case '/preset/effect/base/2':
        $image = new Effects();
        $image->base_1_effect_2();
        break;

    case '/cancel':
        unlink(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image']);
        unlink(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        unlink(PATH_TO_UPLOADS . $_SESSION['name_image']);
        unset($_SESSION['counter_modified_image']);
        unset($_SESSION['edit_name_image']);
        unset($_SESSION['name_image']);
        break;
    case preg_match("#^/uploads/image/(?P<name_image>.+)$#", $path, $tmp):
        header('content-type: image/jpeg');
        $name_image = $tmp['name_image'];
        break;
    case '/download/image':
        copy('uploads/' . $_SESSION['edit_name_image'], 'uploads/' . $_SESSION['name_image']);
        $path_image = 'uploads/' . $_SESSION['name_image'];
        header("Content-Type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Content-Length: " . filesize($path_image ));
        header("Content-Disposition: attachment; filename=" . $path_image );
        readfile($path_image);
        break;
    default:
        include "tpl/main.html";
        break;
}
header('Cache-Control: max-age=3600, must-revalidate');
include "tpl/footer.html";