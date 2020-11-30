<div>
    <div class="card">
        <div class="card-header">
            <strong class="card-title">All Images</strong>
        </div>
        <?php if(isset($this->loadData['msg']['success'])):?>
        <div class="alert alert-success"><?=$this->loadData['msg']['success']?></div>
        <?php endif;?>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($this->loadData['table']['nodata'])){
                        ?>
                            <tr>
                                <td>
                                <?=$this->loadData['table']['nodata']?>
                                </td>
                            </tr>
                        <?php
                    }
                    else{
                    foreach($this->loadData['table'] as $row)
                    {
                        ?>
                            <tr>
                                <td><img src="../assets/images/<?=$row['image']?>" alt="..." width="250" height="150"></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="delete" value="<?=$row['id']?>" hidden>
                                        <button class="btn btn-danger" type="submit" name="submit" onclick="return confirm('Do you want to delete this user?')"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                    }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>