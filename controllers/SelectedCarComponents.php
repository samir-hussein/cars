<?php

namespace controllers;

use core\Application;
use models\HomeCoponentsModel;
use models\SelectedCarComponentsModel;

class SelectedCarComponents
{
    public function components(){

        $brandsSlider = new HomeCoponentsModel();
        $brandsSlider->brandsSlider();
        $components = new SelectedCarComponentsModel();
        $components->selectedCar();
    }

    public function arRenderView(){
        $this->components();
        return Application::$app->router->renderView("Ar/selectedcar.php");
    }

    public function enRenderView(){
        $this->components();
        return Application::$app->router->renderView("En/selectedcar.php");
    }
}

