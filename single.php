<?php require_once 'connectDB/config.php';
$id = $_GET['id'];
$productQuery = mysqli_query($connection, "Select * From products where id='$id'");
$productRow = mysqli_fetch_array($productQuery);
//read comments
$comments = mysqli_query($connection,"SELECT * FROM `comments` WHERE `productid`='$id' ORDER BY `created_at` DESC");
$total = mysqli_num_rows($comments);
//submit comment
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $message = $_POST['comment'];
    $email = $_POST['email'];
    $now = time();
    $insert = mysqli_query($connection, "INSERT INTO `comments` (`productid`,`name`,`message`,`email`,`created_at`) VALUES ('$id','$name','$message','$email','$now')");
    if($insert){
        header('location:single.php?id='.$id);
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>داروخانه دافا</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-rtl.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <script src="js/all.js"></script>
</head>
<body>
<?php include('header.php'); ?>
<div class="container mt-4">
    <div class="row">
        <?php include ('menu.php'); ?>
        <div class="col-lg-9">
            <div class="card">
                <img class="card-img-top img-fluid img-thumbnail" src="uploads/<?php echo $productRow['image'] ?>" alt=""
                     style="display: block;width: 40%;margin-right: auto;margin-left: auto;margin-top: 10px;">
                <div class="card-body">
                    <h3 class="card-title"><i class="fa fa-check"></i> <?php echo $productRow['title'] ?></h3>
                    <h3 class="mt-3">قیمت: <?php echo number_format($productRow['price']) ?> تومان</h3>
                    <h3 class="mt-3">موجودی: <?php echo $productRow['count'] ?> </h3>
                    <br>
                    <p class="card-text">
                        <?php echo nl2br($productRow['description']) ?>
                    </p>
                </div>
                <div class="card-footer bg-info">
                    <?php if ($productRow['count']){?>
                    <a href="cartController.php?add-to-cart=<?=$productRow['id']?>" class="btn btn-success btn-lg">افزودن به سبد خرید</a>
                    <?php } else echo '<span class="text-light">اتمام موجودی</span>'; ?>

                </div>
            </div>
            <div class="card card-outline-secondary my-4">
                <div class="card-header bg-info text-white">نظرات</div>
                <?php if($total){ ?>
                <div class="card-body">
                    <?php while($rows = mysqli_fetch_assoc($comments)){ ?>
                        <div class="text-primary"><?=$rows['name']?></div>
                    <div class=""><?=nl2br($rows['message'])?></div>
                    <hr>
                    <?php } ?>
                </div>
                <?php }else{ ?>
                محتوایی جهت نمایش موجود نمی باشد.
                <?php } ?>
            </div>

            <div class="panel">
                <div class="panel-heading bg-info text-white">ارسال نظر</div>
                <div class="panel-body">
                    <?php if(isset($_SESSION['username'])){ ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">نام و نام خانوادگی :</label>
                        <input name="name" class="form-control" type="text" placeholder="نام و نام خانوادگی را وارد کنید" required>
                    </div>
                    <div class="form-group">
                        <label for="email">ایمیل :</label>
                        <input class="form-control" name="email" type="email" placeholder="ایمیل را وارد کنید">
                    </div>
                    <div class="form-group">
                        <label for="commentarea">دیدگاه :</label>
                        <textarea class="form-control" name="comment" required></textarea>
                    </div>
                    <input class="btn btn-primary btn-lg" type="Submit" name="submit" value="ارسال نظرات">
                    <br>
                    <br>
                </form>
    <?php } else { echo '<div class="alert alert-danger">برای ثبت نظر ابتدا وارد شوید.</div>';} ?>
            </div>
            </div>
        </div>
    </div>

</div>
<?php include ('footer.php'); ?>