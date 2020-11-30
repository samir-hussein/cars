<?php

namespace models\brands;

use core\Application;
use core\DataBase;
use core\Validation;

class AddBrandModel
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
        if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['checkbox']) && !empty($_POST['checkbox']) && isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){

            $name = Validation::validateInput($_POST['name']);
            $type = Validation::validateInput($_POST['checkbox']);

            $sql = "SELECT * FROM $type WHERE name=:name";
            $value = ['name' => $name];
            if(DataBase::$db->prepare($sql,$value)){
                $response = ['error' => "This Brand is already exist"];
                Application::$app->router->loadData = $response;
            }
            else{

                $allowEx = ['png','jpg','jpeg'];
                $dir = 'assets/images/';
                $imgName = Validation::file("image",$allowEx,$dir,$type);
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

                    $sql = "INSERT INTO $type (name,image) VALUES (:name,:image)";
                    $value = [
                        "name" => $name,
                        "image" => $imgName['name']
                    ];

                    if(DataBase::$db->prepare($sql,$value)){
                        $response = ['success' => "Brand added successfully"];
                        Application::$app->router->loadData = $response;
                    }
                    else{
                        $response = ['error' => "Something went wrong"];
                        Application::$app->router->loadData = $response;
                    }
            }
        }
    }
        else{
            $response = [
                'error' => "Empty Field",
                'name' => Validation::validateInput($_POST['name']),
                'checkbox' => (isset($_POST['checkbox']))?Validation::validateInput($_POST['checkbox']):"",
            ];
            Application::$app->router->loadData = $response;
        }
        
    }
}

