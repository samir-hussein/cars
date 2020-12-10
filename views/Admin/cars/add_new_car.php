<div class="card">
    <div class="card-header">
        <strong>Add New Car</strong>
    </div>
    <?php if(isset($this->loadData['msg']['error'])):?>
        <div class="alert alert-danger"><?=$this->loadData['msg']['error']?></div>
        <?php endif;?>
        <?php if(isset($this->loadData['msg']['success'])):?>
        <div class="alert alert-success"><?=$this->loadData['msg']['success']?></div>
        <?php endif;?>
    <div class="card-body card-block">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group"><label for="nf-email" class=" form-control-label">Name</label><input type="text" name="name" placeholder="Enter Name.." class="form-control" value="<?=(isset($this->loadData['msg']['name']))? $this->loadData['msg']['name']:''?>"></div>

        <div class="form-group"><label for="nf-email" class=" form-control-label">Price</label><input type="text" name="price" placeholder="Enter Price.." class="form-control" value="<?=(isset($this->loadData['msg']['price']))? $this->loadData['msg']['price']:''?>"></div>

        <div class="form-group"><label for="nf-email" class=" form-control-label">Year</label><input type="text" name="year" placeholder="Enter Year.." class="form-control" value="<?=(isset($this->loadData['msg']['year']))? $this->loadData['msg']['year']:''?>"></div>

        <div class="form-group">
            <label for="nf-email" class=" form-control-label">Choose Type</label>
            <select name="select" id="select" class="form-control">
                <option value="0">Please select</option>
            <?php
                if(isset($this->loadData['brands'])){
                    foreach($this->loadData['brands'] as $row){
                        ?>
                        <option <?=(isset($this->loadData['msg']['select']) && $this->loadData['msg']['select'] == $row['name'])? "selected":''?> value="<?=$row['name']?>"><?=$row['name']?></option>
                        <?php
                    }
                }
                else{
                    ?>
                    <option value="0">There is no types</option>
                    <?php
                }
            ?>
            </select>
        </div>

        <div class="form-group"><label for="nf-email" class=" form-control-label">Specifications Write in En</label><textarea name="specifications_en" placeholder="Automatic Transmission/Doors=4/Cruise Control" class="form-control"><?=(isset($this->loadData['msg']['specifications_en']))? $this->loadData['msg']['specifications_en']:''?></textarea></div>

        <div class="form-group"><label for="nf-email" class=" form-control-label">Specifications Write in Ar</label><textarea name="specifications_ar" placeholder="ناقل حركه اوتوماتيكي/أبواب=4/مثبت السرعة" class="form-control" dir="rtl"><?=(isset($this->loadData['msg']['specifications_ar']))? $this->loadData['msg']['specifications_ar']:''?></textarea></div>

        <div class="form-group">
        <label class=" form-control-label">Choose Active Image</label>
            <input type="file" name="image" class="form-control-file" multiple>
        </div>

        <div class="form-group">
        <label class=" form-control-label">Choose Rest of Image</label>
            <input type="file" name="images[]" class="form-control-file" multiple>
        </div>

        <input type="text" name="editId" value="<?=(isset($_GET['id']))? $_GET['id']:''?>" hidden>
        
        <div>
            <?php
                if(isset($_GET['id']) && !empty($_GET['id'])):?>
                <button type="submit" name="edit" class="btn btn-success btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Edit
                </button>
                <?php
                    else:?>
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Add
                    </button>
                <?php
                endif;
            ?>
        </div>
    </form>
    </div>
</div>