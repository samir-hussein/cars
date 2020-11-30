<div class="breadcrumbs mt-2 mb-2">
   <div class="col-12">
         <div class="page-header text-center">
            <div class="page-title">
               <h1>Welcome In Admin Panel</h1>
            </div>
         </div>
   </div>
</div>
<section class="p-5">
   <div class="row">
      <div class="col-12 col-md-4">
      <div class="card no-padding">
         <div class="card-body">
            <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-users"></i>
            </div>
            <div class="h4 mb-0">
                  <span class="count"><?=$this->loadData['total_visits']?></span>
            </div>
            <small class="text-muted text-uppercase font-weight-bold">Total Visits</small>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
         </div>
      </div>
      </div>
      <div class="col-12 col-md-4">
      <div class="card no-padding">
         <div class="card-body">
            <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-users"></i>
            </div>
            <div class="h4 mb-0">
                  <span class="count"><?=$this->loadData['visitors']?></span>
            </div>
            <small class="text-muted text-uppercase font-weight-bold">Visitors</small>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
         </div>
      </div>
      </div>
      <div class="col-12 col-md-4">
      <div class="card no-padding">
         <div class="card-body">
            <div class="h1 text-muted text-right mb-4">
                  <i class="fa fa-users"></i>
            </div>
            <div class="h4 mb-0">
                  <span class="count"><?=$this->loadData['daily_visits']?></span>
            </div>
            <small class="text-muted text-uppercase font-weight-bold">Daily Visits</small>
            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
         </div>
      </div>
      </div>
   </div>
</section>
   