<?php

namespace models\brands;

use core\DataBase;
use core\Validation;
use core\Application;

class AllBrandsModel
{

    public function showAllBrands()
    {
        $flag = false;
        $sql = "SELECT * FROM new_brands";
        if($result = DataBase::$db->prepare($sql)){
            Application::$app->router->loadData['table']['new'] = $result;
            $flag = true;
        }
        $sql = "SELECT * FROM used_brands";
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
                    unlink("assets/images/".$row['image']);
                }
            }
            $sql = "DELETE FROM $type WHERE id=:id";
            
            if(DataBase::$db->prepare($sql,$value)){
                $response = ['success' => "Brand Deleted Successfully"];
                Application::$app->router->loadData['msg'] = $response;
            }
        }
    }

}

