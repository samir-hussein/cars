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
    <!-- <link rel="stylesheet" href="../views/Admin/assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../views/Admin/assets/scss/style.css">
    <link href="../views/Admin/assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
    {{content}}
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
