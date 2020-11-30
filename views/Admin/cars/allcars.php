<div class="content mt-3">
        <?php if(isset($this->loadData['msg']['success'])):?>
        <div class="alert alert-success"><?=$this->loadData['msg']['success']?></div>
        <?php endif;?>
        <?php if(isset($_GET['success'])):?>
        <div class="alert alert-success"><?php echo $_GET['success'];?></div>
        <?php endif;?>
            <div class="animated fadeIn">
                <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">All Cars</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Type</th>
                        <th>Model</th>
                        <th>Total KM</th>
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
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
                                <td>New</td>
                                <td><?=$row['price']?></td>
                                <td><?=$row['type']?></td>
                                <td><?=$row['id']?></td>
                                <td></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="delete" value="<?=$row['id']?>" hidden>
                                        <input type="text" name="type" value="new_cars" hidden>
                                        <button class="btn btn-danger" type="submit" name="submit" onclick="return confirm('Do you want to delete this user?')"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button>
                                        <a href="add-new-car?id=<?=$row['id']?>">
                                        <button type="button" class="btn btn-success">Edit</button></a>
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
                                <td>Used</td>
                                <td><?=$row['price']?></td>
                                <td><?=$row['type']?></td>
                                <td><?=$row['model']?></td>
                                <td><?=$row['km']?></td>
                                <td>
                                    <form action="" method="post">
                                        <input type="text" name="delete" value="<?=$row['id']?>" hidden>
                                        <input type="text" name="type" value="used_cars" hidden>
                                        <button class="btn btn-danger" type="submit" name="submit" onclick="return confirm('Do you want to delete this user?')"><i style="font-size: 20px;" class="fa fa-trash-o"></i></button>
                                        <a href="add-used-car?id=<?=$row['id']?>">
                                        <button type="button" class="btn btn-success">Edit</button></a>
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


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

        <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>