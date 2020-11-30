<?php

namespace controllers\home_slider;

use core\Application;
use models\home_slider\AllImagesModel;

class AllImages
{
    public function allImages()
    {
        
        $all = new AllImagesModel();

        if($all->checkSubmit()){
            $all->validate();
        }

        $all->showAllImages();
        return Application::$app->router->renderView("Admin/home_slider/all_images.php");
    }
}

