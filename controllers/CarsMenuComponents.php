<?php

namespace controllers;

use core\Application;
use models\HomeCoponentsModel;
use models\CarsMenuComponentsModel;

class CarsMenuComponents
{

    public function components()
    {
        $brandsSlider = new HomeCoponentsModel();
        $brandsSlider->brandsSlider();
    }

    public function arRenderView()
    {
        $this->components();
        return Application::$app->router->renderView("Ar/carsmenu.php");   
    }

    public function enRenderView()
    {
        $this->components();
        return Application::$app->router->renderView("En/carsmenu.php");   
    }

    public function rearrangeCars()
    {
        $components = new CarsMenuComponentsModel();
        return $components->cars();
    }
}

