<?php

namespace models;

use core\Application;
use core\DataBase;

class HomeCoponentsModel
{

    public function visits()
    {
        //total visits functionality
        $sql = "SELECT total_visits From visits";
        if($response = DataBase::$db->prepare($sql)){
            $totalVisits = $response[0]['total_visits'];
            $totalVisits++;
            $sql = "UPDATE visits SET total_visits=$totalVisits";
            DataBase::$db->prepare($sql);
        }

        //visitors functionality
        $visitor_id = $_SERVER['REMOTE_ADDR'];
        $sql = "SELECT * FROM visitors WHERE visitor_id='$visitor_id'";
        if(!DataBase::$db->prepare($sql)){
            $sql = "INSERT INTO visitors (visitor_id) VALUES ('$visitor_id')";
            DataBase::$db->prepare($sql);
        }

        //daily visits functionality
        $sql = "SELECT today FROM visits";
        if($response = DataBase::$db->prepare($sql)){
            $today = $response[0]['today'];
            $day = date('d');
            if($day != $today){
                $sql = "UPDATE visits SET today=$day, daily_visits=0";
                DataBase::$db->prepare($sql);
            }
            $sql = "SELECT daily_visits FROM visits";
            if($response = DataBase::$db->prepare($sql)){
                $daily_visits = $response[0]['daily_visits'];
                $daily_visits++;
                $sql = "UPDATE visits SET daily_visits=$daily_visits";
                DataBase::$db->prepare($sql);
            }
        }

    }

    public function slider(){
        $sql = "SELECT * FROM home_slider";
        if($response = DataBase::$db->prepare($sql)){
            Application::$app->router->loadData['slider'] = $response;
        }
    }

    public function aboutUs(){
        $sql = "SELECT * FROM about_us";
        if($response = DataBase::$db->prepare($sql)){
            Application::$app->router->loadData['aboutus'] = $response;
        }
    }

    public function brandsSlider()
    {
        $sql = "SELECT * FROM new_brands";
        if($response = DataBase::$db->prepare($sql)){
            Application::$app->router->loadData['brandsSlider'] = $response;
        }
    }

    public function bestOffers()
    {
        $sql = "SELECT * FROM new_cars ORDER BY price ASC LIMIT 6";
        if($response = DataBase::$db->prepare($sql))
        {
            Application::$app->router->loadData['bestnewcars'] = $response;
        }

        $sql = "SELECT * FROM used_cars ORDER BY price ASC LIMIT 6";
        if($response = DataBase::$db->prepare($sql))
        {
            Application::$app->router->loadData['bestusedcars'] = $response;
        }
    }

    public function getAllBrands()
    {
        if(isset($_GET['type'])){
            $type = $_GET['type'];
            $sql = "SELECT * FROM $type";
            if($response = DataBase::$db->prepare($sql)){
                $res['brands'] = $response;
            }
            else $res['brands'] = "no brands";

            return json_encode($res);
        }
    }
}

