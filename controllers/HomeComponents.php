<?php

namespace controllers;

use core\Application;
use models\HomeCoponentsModel;

class HomeComponents
{
    public function components(){

        $components = new HomeCoponentsModel();

        $components->slider();
        $components->aboutUs();
        $components->brandsSlider();
        $components->bestOffers();
        
    }

    public function visits()
    {
        $visits = new HomeCoponentsModel();
        $visits->visits();
    }

    public function arRenderView(){
        $this->components();
        $this->visits();
        return Application::$app->router->renderView("Ar/home.php");
    }

    public function enRenderView(){
        $this->components();
        $this->visits();
        return Application::$app->router->renderView("En/home.php");
    }

    public function getAllBrands()
    {
        $components = new HomeCoponentsModel();
        return $components->getAllBrands();
    }
}

