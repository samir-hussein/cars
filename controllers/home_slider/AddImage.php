<?php

namespace controllers\home_slider;

use core\Application;
use models\home_slider\AddImageModel;

class AddImage
{
    public function addImage()
    {
        $add = new AddImageModel();
        if($add->checkSubmit()){
            $add->validate();
        }
        
        return Application::$app->router->renderView("Admin/home_slider/add_image.php");
    }
}

