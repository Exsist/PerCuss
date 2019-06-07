<?php

function make_random_image_name($max)
{
    $i = 0; //Reset the counter.
    $possible_keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $keys_length = strlen($possible_keys);
    $rand_name = '';
    while($i<$max) {
        $rand = mt_rand(1,$keys_length-1);
        $rand_name .= $possible_keys[$rand];
        $i++;
    }
    return $rand_name;
}

/**
 *
 */
function upload_image()
{
    if (isset($_FILES['user_image']['name'])) {

        $file_name = $_FILES['user_image']['name'];
        if ($_FILES['user_image']['type'] == "image/jpeg") {
            $type_file = ".jpg";
        } elseif ($_FILES['user_image']['type'] == "image/png") {
            $type_file = ".png";
        }
        $path_to_file = 'uploads/';
        $file_path_name = $path_to_file . $file_name ;
        $editing_file_path_name = $path_to_file . 'editing-' . $file_name;
        setcookie("name_image", $file_path_name, time()+86400, '/');
        setcookie("edit_name_image", $editing_file_path_name, time()+86400, '/');

        if ($_FILES['user_image']['error'] > 0) {
        } else {
            if (file_exists($file_path_name)) {
            } else {
                move_uploaded_file($_FILES['user_image']['tmp_name'], $file_path_name);
                copy($file_path_name, $editing_file_path_name);
            }
        }
    }
}

function login($connect, $login, $password)
{
    $login_query = "
            SELECT *
            FROM auth_user
            WHERE login='$login' AND password='$password'
        ";
    $login_response = mysqli_query($connect, $login_query);
    if ($login_response && $login_response->num_rows == 1) {
        echo 'asdassd';
    }
}