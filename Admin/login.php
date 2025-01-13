<?php
require_once '../connectDB/config.php';
include_once 'inc/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ورود به پنل مدیریت</title>
    <link rel="stylesheet" href="../css/bootstrap-rtl.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
</head>
<body>
<br>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">فرم ورود به مدیریت</div>
                <div class="panel-body">
                    <form action="" method="post">
                    <?php
                    //if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        if (admin_login($username, $password)) {
                            header('Location:index.php');
                        } else {
                            echo '<div class="alert alert-danger">';
                            echo 'نام کاربری یا رمز عبور اشتباه می باشد';
                            echo '</div>';
                        }
                    }
                    ?>
                    <br>
                    <input type="text" name="username" class="form-control" placeholder="نام کاربری را وارد کنید">
                    <br>
                    <input type="password" name="password" class="form-control" placeholder="رمز عبور را وارد کنید">
                    <br>
                    <input type="submit" name="login" value="ورود" class="btn btn-success" style="width: 100%">
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>
</html>

