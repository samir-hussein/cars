<?php

namespace controllers;

use core\Application;
use models\BrandsComponentsModel;
use models\HomeCoponentsModel;

class BrandsComponents
{
    public function components(){

        $brandsSlider = new HomeCoponentsModel();
        $brandsSlider->brandsSlider();
        $components = new BrandsComponentsModel();
        $components->brands();
    }

    public function arRenderView(){
        $this->components();
        return Application::$app->router->renderView("Ar/brands.php");
    }

    public function enRenderView(){
        $this->components();
        return Application::$app->router->renderView("En/brands.php");
    }
}

