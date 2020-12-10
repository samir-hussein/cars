<div class="card">
    <div class="card-header">
        <strong>Add Image</strong>
    </div>
        <?php if(isset($this->loadData['error'])):?>
        <div class="alert alert-danger"><?=$this->loadData['error']?></div>
        <?php endif;?>
        <?php if(isset($this->loadData['success'])):?>
        <div class="alert alert-success"><?=$this->loadData['success']?></div>
        <?php endif;?>
    <div class="card-body card-block">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-5">
            <input type="file" name="image" class="form-control-file">
        </div>
        <div>
        <button type="submit" name="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Add
        </button>
        </div>
    </form>
    </div>
</div>