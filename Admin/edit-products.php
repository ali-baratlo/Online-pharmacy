<?php
require_once '../connectDB/config.php';
//cat
$query=mysqli_query($connection,"Select * From category");
//products
$id = $_GET['edit-products-id'];
$products = mysqli_query($connection,"select * from `products` where `id`='$id'");
$rows = mysqli_fetch_assoc($products);
?>
<div class="card mb-3">
    <div class="card-header">
        ویرایش محصول
    </div>
    <div class="card-body">
        <!-- form area -->
        <form action="actions.php?edit-product" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group float-right" style="width: 100%">
                        <input type="text" name="title" class="form-control" value="<?=$rows['title']?>">
                    </div>
                    <div class="form-group">
                        <textarea name="desc" cols="30" rows="10" class="form-control"><?=$rows['description']?></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-3">
                            <input type="number" name="price" class="form-control" style="margin-left: 14px;" size="60" value="<?=$rows['price']?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-3">
                            <input type="number" name="count" class="form-control" style="margin-left: 14px;" size="60" value="<?=$rows['count']?>">
                        </div>
                    </div>
                </div><!--Main Content-->
                <aside class="col-md-4">
                    <div class="form-group">
                        <select name="cat" class="form-control">
                            <?php while($row=mysqli_fetch_array($query)): ?>
                                <option <?=$rows['cat_id']==$row['id']?'selected':''?> value="<?=$row['id']?>"><?=$row['cat_name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="img-fluid img-thumbnail"><img src="../uploads/<?=$rows['image']?>" width="250"></div>
                        <br>
                        <span class="text-danger">تنها در صورتی که میخواهید عکس را عوض کنید فیلد را پر نمایید</span>
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="hidden" name="oldpic" value="<?=$rows['image']?>">
                        <input type="hidden" name="editid" value="<?=$rows['id']?>">
                        <input type="submit" class="btn btn-primary btn-lg" value="ویرایش">
                    </div>

                </aside><!--SIDEBAR-->
            </div>
        </form>

        <!-- end form -->
    </div>
</div>