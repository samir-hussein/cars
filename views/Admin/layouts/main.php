<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    if(!isset($_SESSION['user']) || empty($_SESSION['user'])){
        $this->response->redirect("/admin");
        exit;
    }
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CMS</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../views/Admin/assets/css/normalize.css">
    <link rel="stylesheet" href="../views/Admin/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../views/Admin/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../views/Admin/assets/css/themify-icons.css">
    <link rel="stylesheet" href="../views/Admin/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../views/Admin/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../views/Admin/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="../views/Admin/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../views/Admin/assets/scss/style.css">
    <link href="../views/Admin/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <style>
        html,body{
            padding: 0;
            margin: 0;
            overflow-x: hidden;
        }
    </style>

</head>
<body>
       <!-- Left Panel -->

       <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/admin/home">CMS</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Home Slider</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/home-slider-all-images">All Images</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/home-slider-add-image">Add Image</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>About Us</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/add-about-us">Add</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/all-about-us">All</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Brands</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/all-brands">All Brands</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/add-brand">Add Brand</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Cars</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/all-cars">All Cars</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/add-new-car">Add New Car</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/add-used-car">Add Used Car</a></li>
                        </ul>
                    </li>
                    <?php if($_SESSION['type'] == "owner"):?>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-th"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/add-user">Add</a></li>
                            <li><i class="menu-icon fa fa-th"></i><a href="/admin/all-user">All Users</a></li>
                        </ul>
                    </li>
                    <?php endif;?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">
            <div class="row">
                <div class="col-6">
                    <h5 style="text-transform: capitalize;"><a href="home"><i class="fa fa-user"></i> Welcome <?=$_SESSION['user']?></a></h5>
                </div>
                <div class="col-6">
                    <a href="/admin/logout">
                    <button class="btn btn-danger float-right">Logout</button>
                    </a>
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->
        {{content}}
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script src="../views/Admin/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="../views/Admin/assets/js/plugins.js"></script>
    <script src="../views/Admin/assets/js/main.js"></script>


    <script src="../views/Admin/assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="../views/Admin/assets/js/dashboard.js"></script>
    <script src="../views/Admin/assets/js/widgets.js"></script>
    <script src="../views/Admin/assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="../views/Admin/assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="../views/Admin/assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="../views/Admin/assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="../views/Admin/assets/js/lib/data-table/datatables-init.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>
</body>
</html>
