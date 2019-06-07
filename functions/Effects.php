<?php


class Effects
{
    public  $counter;

    private function set_session_counter()
    {
        if (session_id()) {} else {session_start();}
        $counter = $_SESSION['image_counter'];
        $_SESSION['image_counter'] = $counter++;
    }


    public function effect_base_1($path_to_image, $editing_file_path_name)
    {
        set_session_counter();

        $image = new Imagick($path_to_image . $editing_file_path_name);
        $image->contrastImage(-10);
        $image->modulateImage(100,130, 100);
        $image->levelImage(0, 1.5, 65535);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.3);
        $noise->modulateImage(100,0, 100);
        $noise->writeImage($path_to_image . 'noise.png');
        $image->compositeImage($noise, imagick::COMPOSITE_MULTIPLY, 0, 0, imagick::CHANNEL_DEFAULT);
        $image->writeImage($path_to_image . 'editing-' . $_SESSION['image_counter'] . $editing_file_path_name);
    }

    function effect_base_2($path_to_image, $editing_file_path_name )
    {
        set_session_counter();
        $image = new Imagick($path_to_image . $editing_file_path_name);
        $image->contrastImage(-10);
        $image->modulateImage(100,0, 100);
        $image->levelImage(0, 1.5, 65535);
        $image_width = $image->getImageWidth();
        $image_height = $image->getImageHeight();
        $noise = new Imagick();
        $noise->newImage($image_width, $image_height, "white");
        $noise->addNoiseImage(imagick::NOISE_RANDOM, imagick::CHANNEL_GRAY);
        $noise->setImageOpacity(0.3);
        $noise->modulateImage(100,0, 100);
        $noise->writeImage($path_to_image . 'noise.png');
        $image->compositeImage($noise, imagick::COMPOSITE_MULTIPLY, 0, 0, imagick::CHANNEL_DEFAULT);
        $image->writeImage($path_to_image . 'editing-' . $_SESSION['image_counter'] . $editing_file_path_name);
    }
}