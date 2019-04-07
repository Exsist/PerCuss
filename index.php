<?php

//$connect = mysqli_connect('localhost', 'root', '', 'percuss');

include 'tpl/header.html';

$page = (isset($_GET['page'])) ? $_GET['page']  : '';

if ($page == '') {
    include "tpl/main.html";
} else {
    include "tpl/$page.html";
}

include "tpl/footer.html";