<?php

namespace models\home_slider;

use core\Application;
use core\DataBase;
use core\Validation;

class AddImageModel
{
    public function checkSubmit()
    {
        if(isset($_POST['submit'])){
            return true;
        }
        else return false;
    }

    public function validate()
    {
        if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
            $allowEx = ['png','jpg','jpeg'];
            $dir = 'assets/images/';
            $imgName = Validation::file("image",$allowEx,$dir,"home_slider");

            if($imgName == 2){
                $response = ['error' => "Invalid extension allowed (png - jpg - jpeg)"];
                Application::$app->router->loadData = $response;
            }
            elseif($imgName == 3){
                $response = ['error' => "Error Uploading image try again"];
                Application::$app->router->loadData = $response;
            }
            else{

                $fileName = $dir . $imgName['name'];
                $fun = "convert".$imgName['ext']."ToWebp";
                if(Validation::$fun($fileName)){
                    unlink($fileName);
                    $imgName['name'] = str_ireplace($imgName['ext'],'webp',$imgName['name']);
                }

                $sql = "INSERT INTO home_slider (image) VALUES (:image)";
                $value = ["image" => $imgName['name']];

                if(DataBase::$db->prepare($sql,$value)){
                    $response = ['success' => "Image added successfully"];
                    Application::$app->router->loadData = $response;
                }
                else{
                    $response = ['error' => "Something went wrong"];
                    Application::$app->router->loadData = $response;
                }
            }

        }
        else{
            $response = ['error' => "Choose Image"];
            Application::$app->router->loadData = $response;
        }
    }
}

