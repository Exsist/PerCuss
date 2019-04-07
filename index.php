<?php

//$connect = mysqli_connect('localhost', 'root', '', 'percuss');

include 'tpl/header.html';
$path = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
if ($path) { // TODO: СДЕЛАТЬ РАЗЛИЧНЫЕ ЗАПРОСЫ
}

$page = (isset($_GET['page'])) ? $_GET['page']  : ''; // TODO: Переписать механизм подключения других страниц.

if ($page == '') {
    include "tpl/main.html";
} else {
    include "tpl/$page.html";
}

include "tpl/footer.html";