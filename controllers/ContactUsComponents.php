<?php

namespace controllers;

use core\Application;
use models\HomeCoponentsModel;

class ContactUsComponents
{
    public function components(){

        $components = new HomeCoponentsModel();
        $components->brandsSlider();
        
    }
    public function arRenderView(){
        $this->components();
        return Application::$app->router->renderView("Ar/contact.php");
    }

    public function enRenderView(){
        $this->components();
        return Application::$app->router->renderView("En/contact.php");
    }
}

