<?php
$this->setTitle("Brands");
$path = $_SERVER['REQUEST_URI'];
$path = explode("=",$path);
$path = end($path);
$type = str_replace("brands",'cars',$path);
?>

<section id="brands-sec1">
<div>
<h1 class="text-center m-4">الماركات</h1>
</div>
</section>
<section id="brands-sec2" class="p-5">
    <div class="row">
        <?php
            foreach($this->loadData['brands'] as $row)
            {
                ?>
                <div class="col-6 col-lg-2 my-2">
                    <a href="/cars-menu?page=1&car=<?=$row['name']?>&type=<?=$type?>&arrange=newest" class="uk-box-shadow-small"><img src="assets/images/<?=$row['image']?>" alt="car brands"></a>
                </div>
                <?php
            }
        ?>
    </div>
</section>