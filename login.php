<?php
require_once 'connectDB/config.php';
include_once 'inc/functions.php';
$message = '';
if(isset($_GET['restrict'])){
    $message = '<div class="alert alert-danger">لطفا ابتدا وارد سایت شوید</div>';
}
if (isset($_POST['btn'])) {
    $data = $_POST['frm'];
    if(user_login($data)){
        header('location:index.php');
    }
    else{
        header('location:login.php?error');
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
    <title>صفحه ورود</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-rtl.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
</head>
<body>
<?php include('header.php'); ?>
<div class="container mt-4">
    <div class="row">
        <?php include ('menu.php'); ?>
        <div class="col-lg-9">
            <?=@$message?>
                <div class="card">
                    <div class="card-header bg-info text-white">ورود</div>
                    <div class="card-body">
                        <form action="" method="post" class="form-horizontal">
                                <label>نام کاربری</label>
                                <input type="text" class="form-control" name="frm[username]" placeholder="نام کاربری" required>
                            <label>پسورد</label>
                            <input type="password" class="form-control" name="frm[password]" placeholder="رمز عبور" required>
                            <br>
                            <button name="btn" class="btn btn-primary" type="submit">ورود</button>
                            <br>
                            <a href="signup.php" class="register-link">ثبت نام نکرده‌اید؟ اکنون شروع کنید</a>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php include ('footer.php'); ?>
