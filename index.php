<?php

//$connect = mysqli_connect('localhost', 'root', '', 'percuss');

include 'tpl/header.html';
$path = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
$file_path = '';
if ($path) { // TODO: СДЕЛАТЬ РАЗЛИЧНЫЕ ЗАПРОСЫ
    if ($path == "/upload/image") {
        if (isset($_FILES['user_image']['name'])) {
            if ($_FILES['user_image']['error'] > 0) {
                echo 'Error during file upload ' . $_FILES['user_image']['error'];
            } else {
                if (file_exists('uploads/' . $_FILES['user_image']['name'])) {
                    echo 'File already exists : uploads/' . $_FILES['user_image']['name'];
                } else {
                    move_uploaded_file($_FILES['user_image']['tmp_name'], 'uploads/' . $_FILES['user_image']['name']);
                    echo 'File successfully uploaded : uploads/' . $_FILES['user_image']['name'];
                    $file_path = 'uploads/' . $_FILES['user_image']['name'];
                }
            }
        } else {
            echo 'Please choose a file';
        }
    } elseif ($path == '/effect/1') {

    }
}

$page = (isset($_GET['page'])) ? $_GET['page']  : ''; // TODO: Переписать механизм подключения других страниц.

if ($page == '') {
    include "tpl/main.html";
} else {
    include "tpl/$page.html";
}

include "tpl/footer.html";