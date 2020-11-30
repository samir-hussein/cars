<?php
$this->setTitle("Home");
?>

<section id="slider">
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="animation: scale;autoplay: true;autoplay-interval: 5000;max-height: 570">

    <ul class="uk-slideshow-items">
        <?php
            foreach($this->loadData['slider'] as $row)
            {
                ?>
                <li>
                    <div class="uk-position-cover uk-animation-kenburns uk-animation-reverse uk-transform-origin-center-left">
                        <img src="assets/images/<?=$row['image']?>" alt="slider photo" uk-cover>
                    </div>
                </li>
                <?php
            }
        ?>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

    </div>
</section>

<section class="p-5" id="search">
    <div class="p-3 w-75 m-auto uk-box-shadow-large">
        <h2 class="font-weight-bold text-center">ابحث عن سيارة</h2>
        <form action="/cars-menu" method="GET">
            
            <div class="row w-50 m-auto">
                <div class="my-2 col-12 col-md-4 d-flex">
                <p class="align-self-center font-weight-bold m-0">نطاق السعر (EGP)</p>
                </div>
                <div class="my-2 col-12 col-md-4">
                <div>
                    <input name="price1" class="rounded uk-input uk-form-width-medium" type="text" placeholder="من">
                </div>
                </div>
                <div class="my-2 col-12 col-md-4">
                <div>
                    <input name="price2" class="rounded uk-input uk-form-width-medium" type="text" placeholder="الى">
                </div>
                </div>  
            </div>
            <div class="row m-3">
            <div class="my-2 col-12 col-md-4">
                    <div>
                        <select id="type" name="type" class="rounded uk-select" id="form-stacked-select">
                            <option value="new_cars">جديد</option>
                            <option value="used_cars">مستعمل</option>
                        </select>
                    </div>
                </div>
                <div class="my-2 col-12 col-md-4">
                    <div>
                        <select id="allBrands" name="car" class="rounded uk-select" id="form-stacked-select">
                        </select>
                    </div>
                </div>
                <input type="text" name="page" value="1" hidden>
                <input type="text" name="arrange" value="newest" hidden>
                <div class="my-2 col-12 col-md-4">
                    <button type="submit" class="font-weight-bold rounded uk-button uk-button-secondary"><span class="mx-1" uk-icon="search"></span>بحث</button>
                </div>
            </div>
        </form>
    </div>
</section>
<hr class="uk-divider-icon w-50 m-auto">
<section class="p-5" id="home-sec3">
    <h2 class="text-center">مرحبا بك في معرض للسيارات</h2>
    <?php foreach ($this->loadData['aboutus'] as $row) 
            {
            ?>
                <p class="text-center w-75 m-auto"><?=$row['text']?></p>
            <?php
            }
    ?>
</section>
<hr class="uk-divider-icon w-50 m-auto">
<section class="p-5" id="home-sec4">
    <div class="row">
        <div class="p-0 mx-auto col-12 col-md-4 my-3">
        <div class="p-4 uk-box-shadow-medium">
            <h1>هل تبحث عن سيارة جديدة ؟</h1>
            <p>اعثر على موديلك المفضل</p>
            <a href="/brands?type=new_brands">
            <button type="button" class="w-75 d-block m-auto btn btn-primary btn-lg"><span class="mx-1" uk-icon="search"></span>بحث</button>
            </a>
        </div>
        </div>
        <div class="p-0 mx-auto col-12 col-md-4 my-3">
        <div class="p-4 uk-box-shadow-medium">
            <h1>هل تبحث عن سيارة مستعملة ؟</h1>
            <p>اعثر على موديلك المفضل</p>
            <a href="/brands?type=used_brands">
            <button type="button" class="w-75 d-block m-auto btn btn-primary btn-lg"><span class="mx-1" uk-icon="search"></span>بحث</button>
            </a>
        </div>
        </div>
    </div>
</section>

<section class="p-5" id="home-sec5">
    <h2 class="text-center m-auto font-weight-bold">افضل العروض</h2>
    <div uk-filter="target: .js-filter">
    <div class="row my-5">
        <ul class="m-auto uk-subnav uk-subnav-pill">
            <li class="p-0 uk-active" uk-filter-control="[data-color='new']"><a href="#" class="px-4">سيارات جديدة</a></li>
            <li class="p-0" uk-filter-control="[data-color='used']"><a href="#" class="px-4">سيارات مستعملة</a></li>
        </ul>
    </div>
    <ul class="p-0 list-unstyled d-flex justify-content-around flex-column flex-md-row flex-wrap js-filter uk-child-width-1-2 uk-child-width-1-3@m uk-text-center">
    <?php
        if(isset($this->loadData['bestnewcars'])){
            foreach($this->loadData['bestnewcars'] as $row){
                ?>
                <li data-color="new" class="my-3">
                <div>
                    <div class="card uk-box-shadow-medium">
                        <a class="p-1" href="/selected-car?type=new_cars&car=<?=$row['name']?>">
                        <img src="assets/images/<?=$row['active_image']?>" class="card-img-top mb-4" alt="...">
                        </a>
                        <div class="card-body p-0 px-4">
                            <h5 style="min-height: 7vh;" class="card-title text-right font-weight-bold"><?=$row['name']?></h5>
                            <p class="font-weight-bold text-right m-0">EGP <?=$row['price']?></p>
                        </div>
                        <hr>
                        <ul class="list-unstyled d-flex justify-content-around m-0 mb-3 p-0">
                            <li><span uk-icon="calendar" class="mx-1"></span><?=$row['model']?></li>
                            <li><?=$row['type']?></li>
                        </ul>
                    </div>
                </div>
                </li>
                <?php
            }
        }

        if(isset($this->loadData['bestusedcars'])){
            foreach($this->loadData['bestusedcars'] as $row){
                ?>
                <li data-color="used" class="my-3">
                <div>
                    <div class="card uk-box-shadow-medium">
                        <a class="p-1" href="/selected-car?type=used_cars&car=<?=$row['name']?>">
                        <img src="assets/images/<?=$row['active_image']?>" class="card-img-top mb-4" alt="...">
                        </a>
                        <div class="card-body p-0 px-4">
                            <h5 style="min-height: 7vh;" class="card-title text-right font-weight-bold"><?=$row['name']?></h5>
                            <p class="font-weight-bold text-right m-0">EGP <?=$row['price']?></p>
                        </div>
                        <hr>
                        <ul class="list-unstyled d-flex justify-content-around m-0 mb-3 p-0">
                            <li><span uk-icon="calendar" class="mx-1"></span><?=$row['model']?></li>
                            <li><?=$row['type']?></li>
                        </ul>
                    </div>
                </div>
                </li>
                <?php
            }
        }
    ?>
    </ul>

</div>
</section>

<section id="home-sec6">
    <div id="overlay" class="p-5 row">
        <div class="row w-100 m-auto">
        <div class="col-6 col-md-3 my-2">
            <a href="javascript:;" onclick="scrl('home-sec3')" class="text-decoration-none">
                30 عاما من الخبرة
            </a>
        </div>
        <div class="col-6 col-md-3 my-2"><a href="/brands?type=new_brands" class="text-decoration-none">
            جميع الماركات الحديثة 
        </a></div>
        <div class="col-6 col-md-3 my-2"><a href="/brands?type=used_brands" class="text-decoration-none">
            غير سيارتك
        </a></div>
        <div class="col-6 col-md-3 my-2">
        <a href="/branches" class="text-decoration-none">
            فروعنا الاقرب ليك
        </a>
        </div>
        </div>
    </div>
</section>

<script>
    function getAllBrands(){
        var type = $("#type").val();
        type = type.replace("cars","brands");
        $.getJSON("/HomeComponents/getAllBrands?type="+type,function(data){
            if(data.brands == "no brands") $("#allBrands").html('<option value=" ">لا يوجد ماركات</option>');
            else{
                var brands = data.brands;
                var i = 0;
                var allBrands = '<option value="all">كل الماركات</option>';
                for (var property in brands) {
                    if (brands.hasOwnProperty(property)) {
                        allBrands += "<option value="+brands[i].name+">"+brands[i].name+"</option>";
                    }
                    i++;
                }
                $("#allBrands").html(allBrands);
            }
        });
    }

    getAllBrands();

    $("#type").change(function(){
        var type = $("#type").val();
        type = type.replace("cars","brands");
        getAllBrands();
    });
</script>