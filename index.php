<?php

/**
 * @author Samir Hussein <samirhussein274@gmail.com>
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'core/autoload.php';

use core\Application;
use controllers\Login;
use controllers\Logout;
use controllers\CMSHome;
use controllers\about_us\Add;
use controllers\about_us\All;
use controllers\cars\AllCars;
use controllers\users\AddUser;
use controllers\cars\AddNewCar;
use controllers\HomeComponents;
use controllers\users\AllUsers;
use controllers\brands\AddBrand;
use controllers\cars\AddUsedCar;
use controllers\brands\AllBrands;
use controllers\BrandsComponents;
use controllers\BranchesComponents;
use controllers\CarsMenuComponents;
use controllers\ContactUsComponents;
use controllers\home_slider\AddImage;
use controllers\home_slider\AllImages;
use controllers\SelectedCarComponents;

// Database cofigration 
$config = [
    'serverName' => 'localhost',
    'userName' => 'root',
    'password' => '',
    'dbName' => 'cars'
];
    $app = new Application($config);
    $app->router->route('/',[HomeComponents::class,"arRenderView"]);
    $app->router->route('/contact-us',[ContactUsComponents::class,"arRenderView"]);
    $app->router->route('/branches',[BranchesComponents::class,"arRenderView"]);
    $app->router->route('/cars-menu',[CarsMenuComponents::class,"arRenderView"]);
    $app->router->route('/selected-car',[SelectedCarComponents::class,"arRenderView"]);
    $app->router->route('/brands',[BrandsComponents::class,"arRenderView"]);
    //
    $app->router->route('/en',[HomeComponents::class,"enRenderView"]);
    $app->router->route('/en/contact-us',[ContactUsComponents::class,"enRenderView"]);
    $app->router->route('/en/branches',[BranchesComponents::class,"enRenderView"]);
    $app->router->route('/en/brands',[BrandsComponents::class,"enRenderView"]);
    $app->router->route('/en/selected-car',[SelectedCarComponents::class,"enRenderView"]);
    $app->router->route('/en/cars-menu',[CarsMenuComponents::class,"enRenderView"]);
    //
    $app->router->route('/admin',[Login::class,'login']);
    $app->router->route('/admin/logout',[Logout::class,'logout']);
    $app->router->route('/admin/home',[CMSHome::class,'components']);
    $app->router->route('/admin/add-user',[AddUser::class,'add']);
    $app->router->route('/admin/all-user',[AllUsers::class,'allUsers']);
    $app->router->route('/admin/home-slider-all-images',[AllImages::class,'allImages']);
    $app->router->route('/admin/home-slider-add-image',[AddImage::class,'addImage']);
    $app->router->route('/admin/add-about-us',[Add::class,'add']);
    $app->router->route('/admin/all-about-us',[All::class,'all']);
    $app->router->route('/admin/all-brands',[AllBrands::class,'all']);
    $app->router->route('/admin/add-brand',[AddBrand::class,'add']);
    $app->router->route('/admin/all-cars',[AllCars::class,'all']);
    $app->router->route('/admin/add-new-car',[AddNewCar::class,'add']);
    $app->router->route('/admin/add-used-car',[AddUsedCar::class,'add']);
    //Http Requests
    $app->router->route('/CarsMenuComponents/rearrangeCars');
    $app->router->route('/HomeComponents/getAllBrands');

    $app->run();
?>