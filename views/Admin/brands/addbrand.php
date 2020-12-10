<div class="card">
    <div class="card-header">
        <strong>Add Brand</strong>
    </div>
    <?php if(isset($this->loadData['error'])):?>
        <div class="alert alert-danger"><?=$this->loadData['error']?></div>
        <?php endif;?>
        <?php if(isset($this->loadData['success'])):?>
        <div class="alert alert-success"><?=$this->loadData['success']?></div>
        <?php endif;?>
    <div class="card-body card-block">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group"><label for="nf-email" class=" form-control-label">Name</label><input type="text" name="name" placeholder="Enter Name.." class="form-control" value="<?=(isset($this->loadData['name']))? $this->loadData['name']:''?>"></div>
        <div class="mb-5">
            <input type="file" name="image" class="form-control-file">
        </div>
        <div class="mb-5">
            <div class="form-check">
            <div class="checkbox">
                <label for="checkbox1" class="form-check-label ">
                <input type="radio" name="checkbox" value="new_brands" class="form-check-input" <?=(isset($this->loadData['checkbox']) && $this->loadData['checkbox'] == "new_brands")? 'checked':''?>>New
                </label>
            </div>
            <div class="checkbox">
                <label for="checkbox2" class="form-check-label ">
                <input type="radio" name="checkbox" value="used_brands" class="form-check-input" <?=(isset($this->loadData['checkbox']) && $this->loadData['checkbox'] == "used_brands")? 'checked':''?>>Used
                </label>
            </div>
            </div>
        </div>
        <div>
        <button type="submit" name="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Add
        </button>
        </div>
    </form>
    </div>
</div>