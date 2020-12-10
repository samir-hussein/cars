<?php

namespace controllers\about_us;

use core\Application;
use models\about_us\AllModel;

class All{

    public function all()
    {
        $all = new AllModel();

        if($all->checkSubmit()){
            $all->validate();
        }

        $all->showAll();
        return Application::$app->router->renderView("Admin/about_us/all.php");
    }
    
}
?>