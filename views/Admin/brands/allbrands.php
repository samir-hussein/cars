<div>
    <div class="card">
        <div class="card-header">
            <strong class="card-title">All Brands</strong>
        </div>
        <?php if(isset($this->loadData['msg']['success'])):?>
        <div class="alert alert-success"><?=$this->loadData['msg']['success']?></div>
        <?php endif;?>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Type</th>
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
                        if(isset($this->loadData['table']['new'])){
                    foreach($this->loadData['table']['new'] as $row)
                    {
                        ?>
                            <tr>
                                <td><?=$row['name']?></td>
                                <td><img src="../assets/images/<?=$row['image']?>" alt="..." width="250" height="150"></td>
                                <td>New</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="delete" value="<?=$row['id']?>" hidden>
                                        <input type="text" name="type" value="new_brands" hidden>
                                        <button class="btn btn-danger" type="submit" name="submit" onclick="return confirm('Do you want to delete this user?')"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                    }
                }
                    if(isset($this->loadData['table']['used'])){
                    foreach($this->loadData['table']['used'] as $row)
                    {
                        ?>
                            <tr>
                                <td><?=$row['name']?></td>
                                <td><img src="../assets/images/<?=$row['image']?>" alt="..." width="250" height="150"></td>
                                <td>Used</td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="delete" value="<?=$row['id']?>" hidden>
                                        <input type="text" name="type" value="used_brands" hidden>
                                        <button class="btn btn-danger" type="submit" name="submit" onclick="return confirm('Do you want to delete this user?')"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                    }
                }
                }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>