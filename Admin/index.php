<?php
require_once '../connectDB/config.php';
if(!isset($_SESSION['admin']))
    header('Location:../admin/login.php');

//total product
$prod = mysqli_query($connection,"select * from `products`");
$totalpro = mysqli_num_rows($prod);
//total order
$ord = mysqli_query($connection,"select * from `orders`");
$totalord = mysqli_num_rows($ord);
//total comments
$com = mysqli_query($connection,"select * from `comments`");
$totalcom = mysqli_num_rows($com);
//total user
$us = mysqli_query($connection,"select * from `users`");
$totalus = mysqli_num_rows($us);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل مدیریت داروخانه</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>


</head>
<body>
<nav class="nav top-bar bg-secondary">
    <h3 class="text-center" style="margin-right: 32px;margin-top: 15px;">پنل مدیریت داروخانه</h3>
</nav>

<div class="container-fluid">
    <div class="row admin-panel">
        <div class="col-2 bg-secondary">
            <div class="list-item float-right">
                <a href="index.php"><i class="glyphicon glyphicon-dashboard"></i> پیشخوان</a>
                <a href="index.php?users"><i class="glyphicon glyphicon-user"></i> لیست کاربران</a>
                <a href="index.php?cats"><i class="glyphicon glyphicon-list"></i> دسته بندی ها</a>
                <a href="index.php?add-new-product"><i class="glyphicon glyphicon-plus"></i> محصول جدید</a>
                <a href="index.php?orders"><i class="glyphicon glyphicon-shopping-cart"></i> سفارشات</a>
                <a href="index.php?comments"><i class="glyphicon glyphicon-comment"></i> نظرات</a>
                <a href="../" target="_blank"><i class="glyphicon glyphicon-arrow-up"></i> مشاهده سایت</a>
                <a href="logout.php"><i class="glyphicon glyphicon-remove"></i> خروج</a>
            </div>
        </div>
        <div class="col-10 text-right">
            <div class="row">

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-secondary text-white">کل محصولات</div>
                        <div class="panel-body">
                            <h3 class="font-weight-bold text-center"><?=$totalpro?> عدد</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-secondary text-white">کل سفارشات</div>
                        <div class="panel-body">
                            <h3 class="font-weight-bold text-center"><?=$totalord?> عدد</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-secondary text-white">تعداد نظرات</div>
                        <div class="panel-body">
                            <h3 class="font-weight-bold text-center"><?=$totalcom?> پیام</h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading bg-secondary text-white">تعداد کاربران</div>
                        <div class="panel-body">
                            <h3 class="font-weight-bold text-center"><?=$totalord?> نفر</h3>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_GET['cats'])) {
                require_once 'cats.php';
            } elseif (isset($_GET['add-new-product'])) {
                require_once 'add-new-product.php';
            } elseif (isset($_GET['orders'])) {
                require_once 'orders.php';
            } elseif (isset($_GET['orderDT?trackCode'])) {
                require_once 'orderDT.php';
            } elseif (isset($_GET['answer'])) {
                require_once 'answer.php';
            }
            elseif (isset($_GET['users'])) {
                require_once 'users.php';
            }
            elseif (isset($_GET['add-answer'])) {
                require_once 'add-answer.php';
            }
            elseif (isset($_GET['comments'])) {
                require_once 'comments.php';
            }
            elseif (isset($_GET['edit-products-id'])) {
                require_once 'edit-products.php';
            }
            else {
                require_once 'index.php';
                ?>
                <div class="card mb-3">
                    <div class="card-header text-right">
                        لیست محصولات
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table float-right" style="direction: rtl">
                                <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>تصویر</th>
                                    <th>نام محصول</th>
                                    <th>موجودی</th>
                                    <th>دسته بندی</th>
                                    <th>قیمت-تومان</th>
                                    <th>مشاهده</th>
                                    <th>حذف</th>
                                    <th>ویرایش</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                $product_query = mysqli_query($connection, "Select * From products order by `id` desc");
                                while ($product_row = mysqli_fetch_array($product_query)):
                                    $cat_id = $product_row['cat_id'];
                                    $cat_query = mysqli_query($connection, "Select * From category where id='$cat_id'");
                                    $cat_row = mysqli_fetch_array($cat_query);
                                    ?>
                                    <tr>
                                        <td><?php echo $num++ ?></td>
                                        <td><img src="../uploads/<?php echo $product_row['image'] ?>" width="80px"></td>
                                        <td><?php echo $product_row['title'] ?></td>
                                        <td><?php echo $product_row['count'] ?></td>
                                        <td><?php echo $cat_row['cat_name'] ?></td>
                                        <td><?php echo number_format($product_row['price']) ?></td>
                                        <td><a href="../single.php?id=<?php echo $product_row['id'] ?>"
                                               class="btn btn-primary">مشاهده</a></td>
                                        <td>
                                            <a href="actions.php?delete-product=<?php echo $product_row['id'] ?>"
                                               class="btn btn-danger">حذف</a>
                                        </td>
                                        <td>
                                            <a href="?edit-products-id=<?php echo $product_row['id'] ?>"
                                               class="btn btn-warning">ویرایش</a>
                                        </td>
                                    </tr>
                                <?php
                                endwhile;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- table list -->
            <?php } ?>

        </div>
    </div>
</div>

</body>
</html>