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
    case "/album":
        include "tpl/404.html";
        break;
    case "/upload/image" :
        upload_image();
        break;
    case "/login":
//		$login = $_POST['login'];
//        $password = md5($_POST['password']);
//        login($connect, $login, $password);
        break;

    case '/preset/effect/base/1':
        $image = new Effects();
        $image->basic1Effect1();
        break;
    case '/preset/effect/base/2':
        $image = new Effects();
        $image->basic1Effect2();
        break;
    case '/preset/effect/base/3':
        $image = new Effects();
        $image->basic1Effect3();
        break;
    case '/preset/effect/base/4':
        $image = new Effects();
        $image->basic1Effect4();
        break;

    case '/cancel':
        unlink(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image']);
        unlink(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        unlink(PATH_TO_UPLOADS . $_SESSION['name_image']);
        $_SESSION['counter_modified_image'] = null;
        $_SESSION['edit_name_image'] = null;
        $_SESSION['name_image'] = null;
        break;
    case '/download/image':
        if ($_SESSION['counter_modified_image'] == 0) {
            copy(PATH_TO_UPLOADS . $_SESSION['edit_name_image'], PATH_TO_UPLOADS . $_SESSION['name_image']);
        } else {
            copy(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image'], PATH_TO_UPLOADS . $_SESSION['name_image']);
        }
        break;
    default:
        include "tpl/404.html";
        break;
}
include "tpl/footer.html";