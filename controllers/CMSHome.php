<?php

namespace controllers;

use core\Application;
use models\CMSHomeModel;

class CMSHome
{
    public function components()
    {
        $visits = new CMSHomeModel();
        $visits->visits();
        Application::$app->router->renderView("Admin/home.php");
    }
}

