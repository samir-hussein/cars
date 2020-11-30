<?php

namespace models;

use core\Application;
use core\DataBase;
use core\Validation;

class BrandsComponentsModel
{

    public function brands()
    {
        if(isset($_GET['type']) && !empty($_GET['type']))
        {
            $type = Validation::validateInput($_GET['type']);
            $sql = "SELECT * FROM $type";
            if($response = DataBase::$db->prepare($sql))
            {
                Application::$app->router->loadData['brands'] = $response;
            }
        }
    }
}

