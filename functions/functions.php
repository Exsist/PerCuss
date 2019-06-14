<?php
function translit($str) {
    $rus = ['А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я'];
    $lat = ['A', 'B', 'V', 'G', 'D', 'E', 'E', 'Gh', 'Z', 'I', 'Y', 'K', 'L', 'M', 'N', 'O', 'P', 'R', 'S', 'T', 'U', 'F', 'H', 'C', 'Ch', 'Sh', 'Sch', 'Y', 'Y', 'Y', 'E', 'Yu', 'Ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'gh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', 'y', 'y', 'y', 'e', 'yu', 'ya'];
    return str_replace($rus, $lat, $str);
}

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
        $real_name_image = $_FILES['user_image']['name'];
        $file_name = translit($_FILES['user_image']['name']);
        $file_path_name = $file_name ;
        $editing_file_path_name =  'editing-' . $file_name;
        $_SESSION["name_image"] = $real_name_image;
        $_SESSION["edit_name_image"] = $editing_file_path_name;
        $_SESSION['counter_modified_image'] = 0;
        if ($_FILES['user_image']['error'] > 0) {
        } else {
            if (file_exists($file_path_name)) {
            } else {
                move_uploaded_file($_FILES['user_image']['tmp_name'], "uploads/$editing_file_path_name");
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