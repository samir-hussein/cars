<?php

namespace models\cars;

use core\Application;
use core\DataBase;
use core\Validation;

class AddNewCarModel
{

    public function getAllBrands()
    {
        $sql = "SELECT * FROM new_brands";
        if($result = DataBase::$db->prepare($sql)){
            Application::$app->router->loadData['brands'] = $result;
        }
    }

    public function checkSubmit()
    {
        if(isset($_POST['submit'])){
            return true;
        }
        else return false;
    }

    public function checkSubmitEdit()
    {
        if(isset($_POST['edit'])){
            return true;
        }
        else return false;
    }

    public function showEditCar(){
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = Validation::validateInput($_GET['id']);
            $sql = "SELECT * FROM new_cars WHERE id=:id";
            $value = ['id' => $id];
            if($result = DataBase::$db->prepare($sql,$value)){
                foreach($result as $row){
                    $response = [
                        'name' => $row['name'],
                        'price' => $row['price'],
                        'year' => $row['model'],
                        'select' => $row['type'],
                        'specifications_en' => $row['specifications_en'],
                        'specifications_ar' => $row['specifications_ar'],
                    ];
                }
                Application::$app->router->loadData['msg'] = $response;
            }
            return true;
        }
        else return false;
    }

    public function editCar(){
        if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['year']) && !empty($_POST['year']) && isset($_POST['select']) && !empty($_POST['select']) && isset($_FILES['images']['name'][0]) && !empty($_FILES['images']['name'][0]) && isset($_POST['specifications_en']) && !empty($_POST['specifications_en']) && isset($_POST['specifications_ar']) && !empty($_POST['specifications_ar']) && isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){

            $id = Validation::validateInput($_POST['editId']);
            $value = ['id' => $id];
            $sql = "SELECT * FROM new_cars WHERE id=:id";

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

                $name = Validation::validateInput($_POST['name']);
                $images = [];
                $allowEx = ['png','jpg','jpeg'];
                $dir = 'assets/images/';
                $imgName = Validation::files("images",$allowEx,$dir,"new_car");

                if($imgName == 2){
                    $response = ['error' => "Invalid extension allowed (png - jpg - jpeg)"];
                    Application::$app->router->loadData['msg'] = $response;
                }
                elseif($imgName == 3){
                    $response = ['error' => "Error Uploading image try again"];
                    Application::$app->router->loadData['msg'] = $response;
                }else{
                    for($i = 0; $i < count($imgName); $i++){
                        $fileName = $dir . $imgName[$i]['name'];
                        $fun = "convert".$imgName[$i]['ext']."ToWebp";
                        if(Validation::$fun($fileName)){
                            unlink($fileName);
                            $imgName[$i]['name'] = str_ireplace($imgName[$i]['ext'],'webp',$imgName[$i]['name']);
                        }
                        $images[] = $imgName[$i]['name'];
                    }

                    $activeimgName = Validation::file("image",$allowEx,$dir,"new_car");

                if($activeimgName == 2){
                    $response = ['error' => "Invalid extension allowed (png - jpg - jpeg)"];
                    Application::$app->router->loadData['msg'] = $response;
                }
                elseif($activeimgName == 3){
                    $response = ['error' => "Error Uploading image try again"];
                    Application::$app->router->loadData['msg'] = $response;
                }else{
                        $activefileName = $dir . $activeimgName['name'];
                        $fun = "convert".$activeimgName['ext']."ToWebp";
                        if(Validation::$fun($activefileName)){
                            unlink($activefileName);
                            $activeimgName['name'] = str_ireplace($activeimgName['ext'],'webp',$activeimgName['name']);
                        }
                        $image = $activeimgName['name'];
                    }

                    $images = json_encode($images);
                    $price = Validation::phoneNumber($_POST['price']);
                    $year = Validation::validateInput($_POST['year']);
                    $type = Validation::validateInput($_POST['select']);
                    $specifications_en = Validation::validateInput($_POST['specifications_en']);
                    $specifications_ar = Validation::validateInput($_POST['specifications_ar']);

                    $sql = "UPDATE new_cars SET name=:name,price=:price,model=:model,type=:type,images=:images,specifications_en=:specifications_en,specifications_ar=:specifications_ar WHERE id=:id";
                    $values = [
                        'name' => $name,
                        'price' => $price,
                        'model' => $year,
                        'type' => $type,
                        'id' => $id,
                        'specifications_en' => $specifications_en,
                        'specifications_ar' => $specifications_ar,
                        'images' => $images
                    ];
                    if(DataBase::$db->prepare($sql,$values)){
                        Application::$app->response->redirect("all-cars?success=Car data has been successfully modified");
                    }

                }
            }
        else{
            $response = [
                'error' => "Empty Field",
                'name' => Validation::validateInput($_POST['name']),
                'price' => Validation::validateInput($_POST['price']),
                'year' => Validation::validateInput($_POST['year']),
                'select' => Validation::validateInput($_POST['select']),
                'specifications_en' => Validation::validateInput($_POST['specifications_en']),
                'specifications_ar' => Validation::validateInput($_POST['specifications_ar']),
            ];
            Application::$app->router->loadData['msg'] = $response;
        }
    }

    public function validate()
    {
        if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['year']) && !empty($_POST['year']) && isset($_POST['select']) && !empty($_POST['select']) && isset($_FILES['images']['name'][0]) && !empty($_FILES['images']['name'][0]) && isset($_POST['specifications_en']) && !empty($_POST['specifications_en']) && isset($_POST['specifications_ar']) && !empty($_POST['specifications_ar']) && isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){

            $name = Validation::validateInput($_POST['name']);
                $images = [];
                $allowEx = ['png','jpg','jpeg'];
                $dir = 'assets/images/';
                $imgName = Validation::files("images",$allowEx,$dir,"new_car");

                if($imgName == 2){
                    $response = ['error' => "Invalid extension allowed (png - jpg - jpeg)"];
                    Application::$app->router->loadData['msg'] = $response;
                }
                elseif($imgName == 3){
                    $response = ['error' => "Error Uploading image try again"];
                    Application::$app->router->loadData['msg'] = $response;
                }else{
                    for($i = 0; $i < count($imgName); $i++){
                        $fileName = $dir . $imgName[$i]['name'];
                        $fun = "convert".$imgName[$i]['ext']."ToWebp";
                        if(Validation::$fun($fileName)){
                            unlink($fileName);
                            $imgName[$i]['name'] = str_ireplace($imgName[$i]['ext'],'webp',$imgName[$i]['name']);
                        }
                        $images[] = $imgName[$i]['name'];
                    }

                    $activeimgName = Validation::file("image",$allowEx,$dir,"new_car");

                if($activeimgName == 2){
                    $response = ['error' => "Invalid extension allowed (png - jpg - jpeg)"];
                    Application::$app->router->loadData['msg'] = $response;
                }
                elseif($activeimgName == 3){
                    $response = ['error' => "Error Uploading image try again"];
                    Application::$app->router->loadData['msg'] = $response;
                }else{
                        $activefileName = $dir . $activeimgName['name'];
                        $fun = "convert".$activeimgName['ext']."ToWebp";
                        if(Validation::$fun($activefileName)){
                            unlink($activefileName);
                            $activeimgName['name'] = str_ireplace($activeimgName['ext'],'webp',$activeimgName['name']);
                        }
                        $image = $activeimgName['name'];
                    }

                    $images = json_encode($images);
                    $price = Validation::phoneNumber($_POST['price']);
                    $year = Validation::validateInput($_POST['year']);
                    $type = Validation::validateInput($_POST['select']);
                    $specifications_en = Validation::validateInput($_POST['specifications_en']);
                    $specifications_ar = Validation::validateInput($_POST['specifications_ar']);

                    $sql = "INSERT INTO new_cars (name,price,model,type,images,specifications_en,specifications_ar,active_image) VALUES (:name,:price,:model,:type,:images,:specifications_en,:specifications_ar,:image)";
                    $values = [
                        'name' => $name,
                        'price' => $price,
                        'model' => $year,
                        'type' => $type,
                        'specifications_en' => $specifications_en,
                        'specifications_ar' => $specifications_ar,
                        'images' => $images,
                        'image' => $image
                    ];
                    if(DataBase::$db->prepare($sql,$values)){
                        $response = ['success' => "Car added successfully"];
                        Application::$app->router->loadData['msg'] = $response;
                    }

                }
            }
        else{
            $response = [
                'error' => "Empty Field",
                'name' => Validation::validateInput($_POST['name']),
                'price' => Validation::validateInput($_POST['price']),
                'year' => Validation::validateInput($_POST['year']),
                'select' => Validation::validateInput($_POST['select']),
                'specifications_en' => Validation::validateInput($_POST['specifications_en']),
                'specifications_ar' => Validation::validateInput($_POST['specifications_ar']),
            ];
            Application::$app->router->loadData['msg'] = $response;
        }
    }
}

