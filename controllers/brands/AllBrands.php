<?php

namespace controllers\brands;

use core\Application;
use models\brands\AllBrandsModel;

class AllBrands
{
    public function all()
    {
        $all = new AllBrandsModel();

        if($all->checkSubmit()){
            $all->validate();
        }

        $all->showAllBrands();
        return Application::$app->router->renderView("Admin/brands/allbrands.php");
    }
}

