<?php

namespace controllers\about_us;

use core\Application;
use models\about_us\AddModel;

class Add{

    public function add()
    {
        $add = new AddModel();

        if($add->checkSubmit()){
            $add->validate();
        }
        
        return Application::$app->router->renderView("Admin/about_us/add.php");
    }
}
?>