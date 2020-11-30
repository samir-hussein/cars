<div class="card">
    <div class="card-header">
        <strong>Add Text</strong>
    </div>
    <?php if(isset($this->loadData['error'])):?>
        <div class="alert alert-danger"><?=$this->loadData['error']?></div>
        <?php endif;?>
        <?php if(isset($this->loadData['success'])):?>
        <div class="alert alert-success"><?=$this->loadData['success']?></div>
        <?php endif;?>
    <div class="card-body card-block">
    <form action="" method="post">
        <div class="mb-4">
            <label class="form-control-label">Write Text in Arabic</label>
            <textarea name="text" rows="5" class="form-control" dir="rtl"><?=(isset($this->loadData['text']))?$this->loadData['text']:''?></textarea>
        </div>
        <div class="mb-4">
            <label class="form-control-label">Write Text in English</label>
            <textarea name="texten" rows="5" class="form-control"><?=(isset($this->loadData['texten']))?$this->loadData['texten']:''?></textarea>
        </div>
        <div>
        <button type="submit" name="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Add
        </button>
        </div>
    </form>
    </div>
</div>