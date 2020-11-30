<?php

namespace controllers\cars;

use core\Application;
use models\cars\AddUsedCarModel;

class AddUsedCar
{

    public function add()
    {
        $add = new AddUsedCarModel();

        if($add->checkSubmit()){
            $add->validate();
        }

        $add->showEditCar();

        if($add->checkSubmitEdit()){
            $add->editCar();
        }
        
        $add->getAllBrands();
        return Application::$app->router->renderView("Admin/cars/add_used_car.php");
    }
}

