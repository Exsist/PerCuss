<?php

//phpinfo();

$page = (isset($_GET['page'])) ? $_GET['page']  : '';

if (isset($page)) {
    if ($page == 'main') {
        echo "this is $page page";
    }
    if ($page == 'description') {
        echo "this is $page page";
    }
    if ($page == 'albums') {
        echo "this is $page page";
    }
    if ($page == 'capability') {
        echo "this is $page page";
    }
} else {
    echo "this is main page";
}
