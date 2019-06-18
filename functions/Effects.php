<?php


class Effects
{
    public function basic1Effect1()
    {
        $image = new Imagick(PATH_TO_UPLOADS  . $_SESSION['edit_name_image']);
        $image->contrastImage(-10);
        $image->modulateImage(100,0, 100);
        $image->levelImage(0, 1.5, 65535);
        $image->unsharpMaskImage(0 , 0.5 , 1 , 0.05);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $gradient = new Imagick();
        $gradient->newPseudoImage($image_width,$image_height,'gradient:#000000-#3C86B3');
        $gradient->setImageOpacity(0.75);
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.3);
        $noise->modulateImage(100,0, 100);
        $image->compositeImage($gradient, imagick::COMPOSITE_SCREEN, 0, 0, imagick::CHANNEL_DEFAULT);
        $image->compositeImage($noise, imagick::COMPOSITE_MULTIPLY, 0, 0, imagick::CHANNEL_DEFAULT);
        if (file_exists(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image'])) {
            unlink(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image']);
        }
        if (!isset($_SESSION['counter_modified_image'])) {
            $_SESSION['counter_modified_image'] = 1;
        } else {
            $_SESSION['counter_modified_image']++;
        }
        $image->writeImage(PATH_TO_UPLOADS . $_SESSION['counter_modified_image'] . $_SESSION['edit_name_image']);
        $image->writeImage(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
    }
    public function basic1Effect2()
    {
        $image = new Imagick(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        $image->contrastImage(-10);
        $image->modulateImage(100,0, 100);
        $image->levelImage(0, 1.5, 65535);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $gradient = new Imagick();
        $gradient->newPseudoImage($image_width,$image_height,'gradient:#000000-#D0814D');
        $gradient->setImageOpacity(0.75);
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.3);
        $noise->modulateImage(100,0, 100);
        $image->compositeImage($gradient, imagick::COMPOSITE_SCREEN, 0, 0, imagick::CHANNEL_DEFAULT);
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
    public function basic1Effect3()
    {
        $image = new Imagick(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        $image->contrastImage(-10);
        $image->modulateImage(100,0, 100);
        $image->levelImage(0, 1.5, 65535);
        $image->unsharpMaskImage(0 , 0.5 , 1 , 0.05);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $gradient = new Imagick();
        $gradient->newPseudoImage($image_width,$image_height,'gradient:#000000-#B979FF');
        $gradient->setImageOpacity(0.75);
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.5);
        $noise->modulateImage(100,0, 100);
        $image->compositeImage($gradient, imagick::COMPOSITE_SCREEN, 0, 0, imagick::CHANNEL_DEFAULT);
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
    public function basic1Effect4()
    {
        $image = new Imagick(PATH_TO_UPLOADS . $_SESSION['edit_name_image']);
        $image->contrastImage(-10);
        $image->modulateImage(100,0, 100);
        $image->levelImage(0, 1.5, 65535);
        $image->unsharpMaskImage(0 , 0.5 , 1 , 0.05);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $gradient = new Imagick();
        $gradient->newPseudoImage($image_width,$image_height,'gradient:#000000-#FF4C3D');
        $gradient->setImageOpacity(0.75);
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.5);
        $noise->modulateImage(100,0, 100);
        $image->compositeImage($gradient, imagick::COMPOSITE_SCREEN, 0, 0, imagick::CHANNEL_DEFAULT);
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