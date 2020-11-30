<?php

namespace models\home_slider;

use core\DataBase;
use core\Validation;
use core\Application;

class AllImagesModel
{

    public function showAllImages()
    {
        $sql = "SELECT * FROM home_slider";
        if($result = DataBase::$db->prepare($sql)){
            Application::$app->router->loadData['table'] = $result;
        }
        else{
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
        if(isset($_POST['delete']) && !empty($_POST['delete'])){

            $delete = Validation::validateInput($_POST['delete']);
            $value = ['id' => $delete];
            $sql = "SELECT * FROM home_slider WHERE id=:id";

            if($result = DataBase::$db->prepare($sql,$value)){
                foreach($result as $row){
                    unlink("assets/images/".$row['image']);
                }
            }
            $sql = "DELETE FROM home_slider WHERE id=:id";
            
            if(DataBase::$db->prepare($sql,$value)){
                $response = ['success' => "Image Deleted Successfully"];
                Application::$app->router->loadData['msg'] = $response;
            }
        }
    }
}

