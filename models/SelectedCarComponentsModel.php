<?php

namespace models;

use core\Application;
use core\DataBase;
use core\Validation;

class SelectedCarComponentsModel
{

    public function selectedCar()
    {
        if(isset($_GET['type']) && !empty($_GET['type']) && isset($_GET['car']) && !empty($_GET['car']))
        {
            $type = Validation::validateInput($_GET['type']);
            $car = Validation::validateInput($_GET['car']);

            $sql = "SELECT * FROM $type WHERE name=:name LIMIT 1";
            $value = ['name' => $car];

            if($response = DataBase::$db->prepare($sql,$value))
            {
                Application::$app->router->loadData['selectedcar'] = $response;
            }


        }
    }
}

