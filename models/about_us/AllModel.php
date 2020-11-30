<?php

namespace models\about_us;

use core\DataBase;
use core\Validation;
use core\Application;

class AllModel{

    public function checkSubmit()
    {
        if(isset($_POST['submit'])){
            return true;
        }
        else return false;
    }

    public function showAll()
    {
        $sql = "SELECT * FROM about_us";
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

    public function validate()
    {
        if(isset($_POST['delete']) && !empty($_POST['delete'])){

            $delete = Validation::validateInput($_POST['delete']);
            $sql = "DELETE FROM about_us WHERE id=:id";
            $value = ['id' => $delete];
            if(DataBase::$db->prepare($sql,$value)){
                $response = ['success' => "Text Deleted Successfully"];
                Application::$app->router->loadData['msg'] = $response;
            }
        }
    }
}
?>