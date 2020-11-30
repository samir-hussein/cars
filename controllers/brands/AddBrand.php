<?php

namespace controllers\brands;

use core\Application;
use models\brands\AddBrandModel;

class AddBrand
{
    public function add()
    {
        $add = new AddBrandModel();

        if($add->checkSubmit()){
            $add->validate();
        }
        
        return Application::$app->router->renderView("Admin/brands/addbrand.php");
    }
}

