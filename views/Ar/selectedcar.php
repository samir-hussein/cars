<?php
$this->setTitle("Selected Car");
$row = $this->loadData["selectedcar"][0];
?>

<section id="selectedcar-sec1" style="background-image: url('assets/images/<?=$row['active_image']?>');">
<div>
    <h1><?=$row['name']?></h1>
    <h2>EGP <?=$row['price']?></h2>
</div>
</section>

<section id="selectedcar-sec2" class="p-3">

    <div class="row m-auto">
    <div class="col-12 col-md-8">
        <div>
        <div class="uk-position-relative" uk-slideshow="animation: fade">

<ul class="uk-slideshow-items">
    <li>
        <img src="assets/images/<?=$row['active_image']?>" alt="" uk-cover>
    </li>
    <?php    
        $images = json_decode($row['images']); 
        foreach($images as $image){
            ?>
            <li>
                <img src="assets/images/<?=$image?>" alt="" uk-cover>
            </li>
            <?php
        }?>
</ul>

    <a style="color: #0f6ecd; transform:rotate(180deg);top:40%" class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a style="color: #0f6ecd;transform:rotate(180deg);top:40%" class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>    

<div class="uk-position-small">
    <ul class="uk-thumbnav d-flex justify-content-center">
        <li uk-slideshow-item="0" class="p-0"><a href="#"><img src="assets/images/<?=$row['active_image']?>" width="100" alt=""></a>
        </li>
        <?php
        $i = 0;
        foreach($images as $image){
            $i++;
            ?>
            <li uk-slideshow-item=<?=$i?> class="p-0"><a href="#"><img src="assets/images/<?=$image?>" width="100" alt=""></a></li>
            <?php
        }?>
    </ul>
</div>

</div>
        </div>
    </div>

    <div class="col-12 col-md-4 d-flex align-items-center">
    <div class="row m-auto">
        <div class="col-6 my-3">
            <div>
                <div class="text-center uk-box-shadow-small uk-padding"><?=$row['model']?></div>
            </div>
        </div>
        <div class="col-6 my-3">
            <div>
                <div class="text-center uk-box-shadow-small uk-padding"><?=$row['type']?></div>
            </div>
        </div>
        <?php if(isset($row['km'])){
            ?>
            <div class="col-12 my-3">
            <div>
                <div class="text-center uk-box-shadow-small uk-padding"><?=$row['km']?> الف كيلو متر</div>
            </div>
        </div>
            <?php
        }?>
    </div>
    </div>
    </div>
    
</section>
<section id="selectedcar-sec3" class="p-5">
    <div class="row m-auto">
        <div class="col-12 col-md-8">
        <table class="table">
  <thead style="background-color: #228dcb; color:#fff">
    <tr>
      <th colspan="2">الـمـواصـفـات</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $specifications = explode("/",$row['specifications_ar']);
      foreach($specifications as $one){
          if(strpos($one,"=") !== false){
              $one = explode("=",$one);
              ?>
                <tr>
                    <td><?=$one[0]?></td>
                    <td><?=$one[1]?></td>
                </tr>
              <?php
          }
          else{
              ?>
                <tr>
                    <td><?=$one?></td>
                    <td><span uk-icon="check"></span></td>
                </tr>
              <?php
          }
      }
      ?>
  </tbody>
</table>
        </div>
    </div>
</section>