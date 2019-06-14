<?php


class Effects
{
    public function base_1_effect_1()
    {
        $image = new Imagick(PATH_TO_UPLOADS  . $_SESSION['edit_name_image']);
        $image->contrastImage(-10);
        $image->modulateImage(100,130, 100);
        $image->levelImage(0, 1.5, 65535);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.5);
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
    }

    function base_1_effect_2()
    {
        $image = new Imagick(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        $image->contrastImage(-10);
        $image->modulateImage(100,0, 100);
        $image->levelImage(0, 1.5, 65535);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.5);
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
    }
}