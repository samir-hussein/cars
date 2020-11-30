<?php

namespace models;
use core\DataBase;
use core\Pagination;
use core\Validation;

class CarsMenuComponentsModel
{
    public static function changePaginationToAr()
    {
        Pagination::changePaginationToAr();
    }
    
    public function cars()
    {
        if(isset($_GET['type']) && !empty($_GET['type']) && isset($_GET['car']) && !empty($_GET['car']) && isset($_GET['page']) && !empty($_GET['page']))
        {

            $arrange = Validation::validateInput($_GET['arrange']);
            $limit = 6;
            $page = Validation::validateInput($_GET['page']);
            $start = ($page - 1) * $limit;
            $type = Validation::validateInput($_GET['type']);
            $car = Validation::validateInput($_GET['car']);
            $sql = "SELECT count(*) FROM $type WHERE type='$car'";
            $total_recordes = DataBase::$db->countColumn($sql);
            $href = "cars-menu?page=%s&car=$car&type=$type&arrange=$arrange&carname=''&price1=''&price2=''";
            if($arrange == "newest"){
                if(isset($_GET['carname']) && !empty($_GET['carname'])){
                    $carName = Validation::validateInput($_GET['carname']);
                    if(isset($_GET['price1']) && isset($_GET['price2']) && !empty($_GET['price1']) && !empty($_GET['price2'])){
                        $price1 = Validation::phoneNumber($_GET['price1']);
                        $price2 = Validation::phoneNumber($_GET['price2']);
                        $href = "cars-menu?page=%s&car=$car&type=$type&arrange=$arrange&carname=$carName&price1=$price1&price2=$price2";
                        $sql = "SELECT count(*) FROM $type WHERE type='$car' AND name LIKE '%$carName%' AND price BETWEEN $price1 AND $price2";
                        $total_recordes = DataBase::$db->countColumn($sql);
                        $sql = "SELECT * FROM $type WHERE type='$car' AND name LIKE '%$carName%' AND price BETWEEN $price1 AND $price2 ORDER BY model DESC LIMIT $start,$limit";
                    }
                    else{
                        $href = "cars-menu?page=%s&car=$car&type=$type&arrange=$arrange&carname=$carName";
                        $sql = "SELECT count(*) FROM $type WHERE type='$car' AND name LIKE '%$carName%'";
                        $total_recordes = DataBase::$db->countColumn($sql);
                        $sql = "SELECT * FROM $type WHERE type='$car' AND name LIKE '%$carName%' ORDER BY model DESC LIMIT $start,$limit";
                    }
                }
                else{
                    if(isset($_GET['price1']) && isset($_GET['price2']) && !empty($_GET['price1']) && !empty($_GET['price2'])){
                        $price1 = Validation::phoneNumber($_GET['price1']);
                        $price2 = Validation::phoneNumber($_GET['price2']);
                        $href = "cars-menu?page=%s&car=$car&type=$type&arrange=$arrange&price1=$price1&price2=$price2";
                        $sql = "SELECT count(*) FROM $type WHERE type='$car' AND price BETWEEN $price1 AND $price2";
                        $total_recordes = DataBase::$db->countColumn($sql);
                        $sql = "SELECT * FROM $type WHERE type='$car' AND price BETWEEN $price1 AND $price2 ORDER BY model DESC LIMIT $start,$limit";
                    }
                    else{
                        $sql = "SELECT * FROM $type WHERE type='$car' ORDER BY model DESC LIMIT $start,$limit";
                    }
                }
            }
            else{
                if(isset($_GET['carname']) && !empty($_GET['carname'])){
                    $carName = Validation::validateInput($_GET['carname']);
                    if(isset($_GET['price1']) && isset($_GET['price2']) && !empty($_GET['price1']) && !empty($_GET['price2'])){
                        $price1 = Validation::phoneNumber($_GET['price1']);
                        $price2 = Validation::phoneNumber($_GET['price2']);
                        $href = "cars-menu?page=%s&car=$car&type=$type&arrange=$arrange&carname=$carName&price1=$price1&price2=$price2";
                        $sql = "SELECT count(*) FROM $type WHERE type='$car' AND name LIKE '%$carName%' AND price BETWEEN $price1 AND $price2";
                        $total_recordes = DataBase::$db->countColumn($sql);
                        $sql = "SELECT * FROM $type WHERE type='$car' AND name LIKE '%$carName%' AND price BETWEEN $price1 AND $price2 ORDER BY price $arrange LIMIT $start,$limit";
                    }
                    else{
                        $href = "cars-menu?page=%s&car=$car&type=$type&arrange=$arrange&carname=$carName";
                        $sql = "SELECT count(*) FROM $type WHERE type='$car' AND name LIKE '%$carName%'";
                        $total_recordes = DataBase::$db->countColumn($sql);
                        $sql = "SELECT * FROM $type WHERE type='$car' AND name LIKE '%$carName%' ORDER BY price $arrange LIMIT $start,$limit";
                    }
                }else{
                    if(isset($_GET['price1']) && isset($_GET['price2']) && !empty($_GET['price1']) && !empty($_GET['price2'])){
                        $price1 = Validation::phoneNumber($_GET['price1']);
                        $price2 = Validation::phoneNumber($_GET['price2']);
                        $href = "cars-menu?page=%s&car=$car&type=$type&arrange=$arrange&price1=$price1&price2=$price2";
                        $sql = "SELECT count(*) FROM $type WHERE type='$car' AND price BETWEEN $price1 AND $price2";
                        $total_recordes = DataBase::$db->countColumn($sql);
                        $sql = "SELECT * FROM $type WHERE type='$car' AND price BETWEEN $price1 AND $price2 ORDER BY price $arrange LIMIT $start,$limit";
                    }
                    else{
                        $sql = "SELECT * FROM $type WHERE type='$car' ORDER BY price $arrange LIMIT $start,$limit";
                    }
                }
            }

            if($response = DataBase::$db->prepare($sql))
            {
                $res['cars'] = $response;
                if(isset($_GET['ar'])){
                    $this->changePaginationToAr();
                }
                //make pagination style
                if($pagination = Pagination::pagination($limit,$total_recordes,$page,$href))
                {
                    $res['paginations'] = $pagination['pagination'] . $pagination['paginationMobileView'];
                }
                else{
                    $res['paginations'] = "";
                }
                $res['choose'] = $arrange;
            }
            else $res['cars'] = 'no result';
            $res['carname'] = (isset($_GET['carname']))? $_GET['carname']:'';
            return json_encode($res);
        }
    }
}

