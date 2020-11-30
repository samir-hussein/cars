<?php

namespace models\about_us;

use core\Application;
use core\DataBase;
use core\Validation;

class AddModel{

    public function checkSubmit()
    {
        if(isset($_POST['submit'])){
            return true;
        }
        else return false;
    }

    public function validate()
    {
        
        if(isset($_POST['text']) && !empty($_POST['text']) && isset($_POST['texten']) && !empty($_POST['texten'])){

            $text = Validation::validateInput($_POST['text']);
            $texten = Validation::validateInput($_POST['texten']);

            $sql = "INSERT INTO about_us (text,text_en) VALUES (:text,:texten)";
            $values = [
                'text' => $text,
                'texten' => $texten,
            ];

            if(DataBase::$db->prepare($sql,$values)){
                $response = ['success' => "Text added successfully"];
                Application::$app->router->loadData = $response;
            }

        }
        else{
            $response = [
                'error' => "Empty Field",
                'text' => Validation::validateInput($_POST['text']),
                'texten' => Validation::validateInput($_POST['texten']),
            ];
            Application::$app->router->loadData = $response;
        }
    }
}
?>