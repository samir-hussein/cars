<?php
$this->setTitle("Cars Menu");
$path = explode("?", $_SERVER['REQUEST_URI']);
$path = end($path);
$ajaxPath = $path;
$path = explode("&", $path);
$path = "$path[2]";
?>

<section id="brands-sec1">
    <div>
        <h1 class="text-center m-4">قائمة السيارات</h1>
    </div>
</section>

<section id="carmenu_searchbox" class="pt-5">
    <div class="row m-auto uk-box-shadow-large">
        <form class="m-auto">
            <ul class="list-unstyled d-flex p-0">
                <li class="position-relative">
                    <input type="text" id="carType" value="<?= $this->loadData['cars'][0]['name'] ?? "" ?>" hidden>
                    <select name="" id="choose">
                        <option value="newest">احدث السيارات</option>
                        <option value="ASC">السعر (الاقل الى الاعلى)</option>
                        <option value="DESC">السعر (الاعلى الى الاقل)</option>
                    </select>
                    <span style="cursor:pointer" class="uk-position-center-left" uk-icon="icon: chevron-down; ratio: 1"></span>
                </li>
                <li><input id="carName" type="text" placeholder="ابحث بأسم السيارة"></li>
                <li><button type="button" id="searchByName" class="btn btn-lg btn-success"><span uk-icon="icon: search; ratio: 1"></span></button></li>
            </ul>
        </form>
    </div>
</section>

<section id="carsmenu-sec2" class="p-5">
    <div class="row" id="showcars">

    </div>
</section>

<section id="pagination">

</section>

<script>
    var path = "<?= $ajaxPath ?>&ar";
    var carName = $("#carName").val();
    $("#choose").change(function() {
        carName = $("#carName").val();
        var choose = $(this).val();
        path = path + "&arrange=" + choose + "&carname=" + carName;
        showComponents();
    })

    $("#searchByName").click(function() {
        carName = $("#carName").val();
        var choose = $("#choose").val();
        path = path + "&arrange=" + choose + "&carname=" + carName;
        showComponents();
    })

    function showComponents() {
        if ("<?= $_GET['car'] ?>" == "all") {
            $("#showcars").html("<h3 class='row m-auto'>من فضلك اختر ماركة سيارة للعرض</h3>");
        } else {
            $.getJSON("/CarsMenuComponents/rearrangeCars?" + path, function(data) {
                if (data.cars == "no result") {
                    $("#showcars").html("<h3 class='row m-auto'>لا يوجد سيارات للعرض حاليا</h3>");
                    $("#carName").val(data.carname);
                    $("#pagination").html('');
                } else {
                    $("#pagination").html(data.paginations);
                    $("#choose").val(data.choose);
                    $("#carName").val(data.carname);
                    var cars = data.cars;
                    var i = 0;
                    var dataShow = '';
                    for (var property in cars) {
                        if (cars.hasOwnProperty(property)) {
                            dataShow += "<div class='col-12 col-md-6 col-lg-4 my-3'><div class='card uk-box-shadow-medium'><a class='p-1' href='/selected-car?<?= $path ?>&car=" + cars[i].name + "'><img src='assets/images/" + cars[i].active_image + "' class='card-img-top mb-4' alt='...'></a><div class='card-body p-0 px-4'><h5 style='min-height: 7vh;' class='card-title text-right font-weight-bold'>" + cars[i].name + "</h5><p class='font-weight-bold text-right m-0'>EGP " + cars[i].price + "</p></div><hr><ul class='list-unstyled d-flex justify-content-around m-0 mb-3 p-0'><li><span uk-icon='calendar' class='mx-1'></span>" + cars[i].model + "</li><li>" + cars[i].type + "</li></ul></div></div>";
                        }
                        i++;
                    }
                    $("#showcars").html(dataShow);
                }
            });
        }

    }

    showComponents();
</script>