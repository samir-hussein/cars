<?php

namespace controllers\users;

use models\users\AllUsersModel;
use core\Application;

class AllUsers
{
    public function allUsers()
    {
        $allusers = new AllUsersModel();
        if($allusers->checkSubmit()){
            $allusers->validate();
        }
        $allusers->showAll();
        return Application::$app->router->renderView("Admin/users/allusers.php");
    }
}

