<?php

namespace controllers\cars;

use core\Application;
use models\cars\AddNewCarModel;

class AddNewCar
{
    public function add()
    {
        $add = new AddNewCarModel();

        if($add->checkSubmit()){
            $add->validate();
        }
        $add->showEditCar();

        if($add->checkSubmitEdit()){
            $add->editCar();
        }
        $add->getAllBrands();
        return Application::$app->router->renderView("Admin/cars/add_new_car.php");
    }
}