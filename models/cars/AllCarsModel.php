<?php

namespace models\cars;

use core\Application;
use core\DataBase;
use core\Validation;

class AllCarsModel
{
    public function showAllCars()
    {
        $flag = false;
        $sql = "SELECT * FROM new_cars";
        if($result = DataBase::$db->prepare($sql)){
            Application::$app->router->loadData['table']['new'] = $result;
            $flag = true;
        }
        $sql = "SELECT * FROM used_cars";
        if($result = DataBase::$db->prepare($sql)){
            Application::$app->router->loadData['table']['used'] = $result;
            $flag = true;
        }
        if($flag == false){
            $response = [
                'nodata' => "There is no data to show"
            ];
            Application::$app->router->loadData['table'] = $response;
        }
    }

    public function checkSubmit()
    {
        if(isset($_POST['submit'])){
            return true;
        }
        else return false;
    }

    public function validate()
    {
        if(isset($_POST['delete']) && !empty($_POST['delete']) && isset($_POST['type']) && !empty($_POST['type'])){

            $delete = Validation::validateInput($_POST['delete']);
            $type = Validation::validateInput($_POST['type']);
            $value = ['id' => $delete];
            $sql = "SELECT * FROM $type WHERE id=:id";

            if($result = DataBase::$db->prepare($sql,$value)){
                foreach($result as $row){
                    $images = json_decode($row['images']);
                    foreach($images as $image){
                        unlink("assets/images/".$image);
                    }
                    $activeimage = $row['active_image'];
                    unlink("assets/images/".$activeimage);
                }
            }
            $sql = "DELETE FROM $type WHERE id=:id";
            
            if(DataBase::$db->prepare($sql,$value)){
                $response = ['success' => "Car Deleted Successfully"];
                Application::$app->router->loadData['msg'] = $response;
            }
        }
    }
}

