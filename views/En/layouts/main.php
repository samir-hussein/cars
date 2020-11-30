<?php
use core\Application;
$path = $this->request->getPath();
$path = explode("/",$path);
$path = end($path);
$param = $_SERVER['REQUEST_URI'];
if(strpos($param,"?") !== false){
    $param = explode('?',$param);
    $param = end($param);
}
else $param = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=Application::$app->router->title?></title>
    <!-- Bootstrab 4 CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <!-- UIkit CSS -->
    <link rel="stylesheet" href="../assets/css/uikit.min.css" />
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <!-- My CSS  -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/preloader.css">
    <!-- JQuery  -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
</head>
<body>

    <div class="preload">
        <div class="loader">Loading...</div>
    </div>

    <div class="row p-2" style="background: #228dcb;">
        <div class="col-3 col-md-6 align-self-center m-auto">
            <p class="d-flex m-0 font-weight-bold" style="color: #fff;"><span class="mx-1 align-self-center" uk-icon="receiver"></span>191919</p>
        </div>
        <div class="col-6 col-md-2 ml-5 d-flex justify-content-around align-self-center">
            <a href="" style="width: 25px; height:25px" class="uk-icon-button" uk-icon="facebook"></a>
            <a href="" style="width: 25px; height:25px" class="uk-icon-button" uk-icon="youtube"></a>
            <a href="" style="width: 25px; height:25px" class="uk-icon-button" uk-icon="instagram"></a>
            <a href="" style="width: 25px; height:25px" class="uk-icon-button" uk-icon="twitter"></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="/en"><img src="../assets/images/logo.webp" alt="logo" width="65"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="p-0 navbar-nav mr-auto">
                    <li class="nav-item mx-xl-4 font-weight-bold">
                        <a class="d-flex nav-link align-self-end" href="/en">HOME</a>
                    </li>
                    <li class="nav-item mx-xl-4 font-weight-bold">
                        <a class="nav-link" href="/en/brands?type=new_brands">NEW CARS</a>
                    </li>
                    <li class="nav-item mx-xl-4 font-weight-bold">
                        <a class="nav-link" href="/en/brands?type=used_brands">USED CARS</a>
                    </li>
                    <li class="nav-item mx-xl-4 font-weight-bold">
                        <a class="nav-link" href="/en/branches">BRANCHES</a>
                    </li>
                    <?php if($path === "en"):?>
                    <li class="nav-item mx-xl-4 font-weight-bold">
                        <a class="nav-link" href="javascript:;" onclick="scrl('home-sec3');">ABOUT US</a>
                    </li>
                    <?php endif;?>
                    <li class="nav-item mx-xl-4 font-weight-bold">
                        <a class="d-flex nav-link" href="/en/contact-us">CONTACT US</a>
                    </li>
                    <li class="nav-item mx-xl-4 font-weight-bold">
                        <a class="d-flex nav-link" href="<?=($path !== "en")? '/'.$path."?".$param:'/'?>">عربى<span class="mx-1" uk-icon="world"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main>
        {{content}}

        <section class="py-4" id="home-sec7">
<div uk-slider="autoplay: true;autoplay-interval: 2000">

    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

        <ul class="d-flex uk-slider-items uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-6@m">
        <?php
                foreach($this->loadData['brandsSlider'] as $row)
                {
                    ?>
                    <li class="align-self-center">
                        <img src="../assets/images/<?=$row['image']?>" alt="car brand">
                    </li>
                    <?php
                }
            ?>
        </ul>

        <a style="color:#0f6ecd" class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a style="color:#0f6ecd" class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

    </div>
</div>
</section>
    </main>
    <footer>
        <div id="arrow-scrl"><button type="button" onclick="arrowScrl()">
        <span uk-icon="icon:chevron-up;ratio:2"></span>
        </button>
        </div>
        <div class="d-flex justify-content-around p-4 w-75 m-auto">
                <div>
                    <a href="#" class="uk-icon-button" uk-icon="facebook"></a>
                </div>
                <div>
                    <a href="#" class="uk-icon-button" uk-icon="whatsapp"></a>
                </div>
                <div>
                    <a href="#" class="uk-icon-button" uk-icon="twitter"></a>
                </div>
                <div>
                    <a href="#" class="uk-icon-button" uk-icon="instagram"></a>
                </div>
        </div>
        <hr class="uk-divider-icon w-75 m-auto">
        <div class="row p-md-5 p-3">
            <div class="col-12 col-md-6 col-lg-3">
                <ul class="d-inline-block p-0 m-0 list-unstyled">
                    <li class="my-3"><a href="/en" class="text-decoration-none"><span uk-icon="triangle-right"></span>HOME</a></li>
                    <li class="my-3"><a href="javascript:;" onclick="scrl('home-sec3');" class="text-decoration-none"><span uk-icon="triangle-right"></span>ABOUT US</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <ul class="d-inline-block p-0 m-0 list-unstyled">
                <li class="my-3"><a href="/en/brands?type=new_brands" class="text-decoration-none"><span uk-icon="triangle-right"></span>NEW CARS</a></li>
                <li class="my-3"><a href="/en/brands?type=used_brands" class="text-decoration-none"><span uk-icon="triangle-right"></span>USED CARS</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <ul class="d-inline-block p-0 m-0 list-unstyled">
                <li class="my-3"><a href="/en/branches" class="text-decoration-none"><span uk-icon="triangle-right"></span>BRANCHES</a></li>
                    <li class="my-3"><a href="/en/contact-us" class="text-decoration-none"><span uk-icon="triangle-right"></span>CONTACT US</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <ul class="d-inline-block p-0 m-0 list-unstyled">
                    <li class="my-3"><a href="<?=($path !== "en")? '/'.$path."?".$param:'/'?>" class="d-flex text-decoration-none"><span class="mx-1" uk-icon="world"></span>عربى</a></li>
                </ul>
            </div>
        </div>
        <div class="row" id="author">
            <p class="m-1 p-4 mx-auto text-center">© 2020 All rights reserved. Designed & developed by <a href="https://web.facebook.com/SamirHussein011">Samir Ebrahim</a></p>
        </div>
    </footer>
    <!-- Bootstrab 4 JS -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- UIkit JS -->
    <script src="../assets/js/uikit.min.js"></script>
    <script src="../assets/js/uikit-icons.min.js"></script>
    <!-- My script -->
    <script src="../assets/js/script.js"></script>
    <!-- preloader function -->
    <script>
        $(window).on("load",function(){
            $(".preload").fadeOut("slow");
        });
    </script>
</body>
</html>