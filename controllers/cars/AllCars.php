<?php

namespace controllers\cars;

use core\Application;
use models\cars\AllCarsModel;

class AllCars
{
    public function all()
    {
        $all = new AllCarsModel();

        if($all->checkSubmit()){
            $all->validate();
        }

        $all->showAllCars();
        return Application::$app->router->renderView("Admin/cars/allcars.php");
    }
}

