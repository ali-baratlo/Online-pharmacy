<?php
require_once '../connectDB/config.php';
if(!isset($_SESSION['doctor']))
    header('Location:../doctor/login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>پنل مدیریت پزشک</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>


</head>
<body>
<nav class="nav top-bar bg-secondary">
    <h3 class="text-center" style="margin-right: 32px;margin-top: 15px;">پنل مدیریت پزشک</h3>
</nav>

<div class="container-fluid">
    <div class="row admin-panel ">
        <div class="col-2 bg-secondary">
            <div class="list-item float-right">
                <a href="index.php"><i class="glyphicon glyphicon-dashboard"></i> پیشخوان</a>
                <a href="index.php?answer"><i class="glyphicon glyphicon-list"></i>کل سوالات</a>
                <a href="logout.php"><i class="glyphicon glyphicon-remove"></i> خروج</a>
            </div>
        </div>
        <div class="col-10 text-right">
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
            elseif (isset($_GET['add-answer'])) {
                require_once 'add-answer.php';
            }
            else {
                require_once 'index.php';
                ?>
                <div class="card mb-3">
                    <div class="card-header text-right">
                      آخرین سوالات
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table float-right" style="direction: rtl">
                                <thead>
                                <tr>
                                    <th>شناسه</th>
                                    <th>متن سوال</th>
                                    <th>پاسخ</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                $cat_query = mysqli_query($connection, "Select * From questions ORDER BY `id` DESC LIMIT 25");
                                while ($cat_row = mysqli_fetch_array($cat_query)):
                                    ?>
                                    <tr>
                                        <td><?php echo $num++ ?></td>
                                        <td><?php echo $cat_row['question_text'] ?></td>
                                        <td>
                                            <a href="index.php?add-answer&id=<?php echo $cat_row['id'] ?>"
                                               class="btn btn-success btn-lg">پاسخ</a>
                                        </td>
                                        <td>
                                            <a href="delete-answer.php?qid=<?php echo $cat_row['id'] ?>"
                                               class="btn btn-danger btn-lg">حذف</a>
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