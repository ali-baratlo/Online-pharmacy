<?php
require_once 'connectDB/config.php';
$message='';
$num = 1;
$sumprice=0;
$session = $_SESSION;
$cart = [];
$code = rand(10000000, 99999999);
if (isset($_POST['saveOrder'])) {
    $message = '<div class="alert alert-success">ثبت سفارشات با موفقیت انجام شد - کد رهگیری شما: '.$code.' </div>';
}

foreach ($session as $keySession => $value) {
    if (substr($keySession, 0, 5) == 'cart_') {
        $cart[$keySession] = $value;
    }
}

foreach ($cart as $item => $values):
    $sumprice+=$values['price'];
endforeach;

if (isset($_POST['saveOrder'])) {

    $customer=$_POST['customer'];
    $tel=$_POST['tel'];
    $address=$_POST['address'];
    //$now = time();

    $query = mysqli_query($connection, "Insert Into orders(customer,tel,address,priceCol,dateOrder,status,trackCode) values('$customer','$tel','$address','$sumprice','1400/08/30','پرداخت شده','$code')");
    foreach ($cart as $item => $values):
        {
            $id = $values['id'];
            $productDT = $values['name'];
            $quantityDT = $values['quantity'];
            $priceDT = $values['price']/ $values['quantity'];
            $totalDT = $values['price'] ;
            $trackCodeDT = $code;
            $image = $values['image'];
            $queryDT = mysqli_query($connection, "Insert Into orderdetails(nameProduct,quantity,price,total,trackCode,image) values('$productDT','$quantityDT','$priceDT','$totalDT','$trackCodeDT','$image')");
            $update = mysqli_query($connection,"update `products` set `count`=`count`-$quantityDT where `id`='$id'");
        }
    endforeach;

}
/*if (isset($_POST['saveOrder'])) {
    $customer = $_POST['customer'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    header("location: gateway/zarinpal.php?customer=$customer&tel=$tel&address=$address&sumprice=$sumprice");
}*/
?>
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
</head>
<body>
<?php include('header.php'); ?>
<div class="container mt-4">
    <div class="row">
        <?php include ('menu.php'); ?>
        <div class="col-sm-9">
        <div class="panel panel-info">
            <div class="panel-heading">فرم مشخصات مشتری</div>
            <div class="panel-body">
                <?=@$message?>
                <form action="" method="post">
                    <input type="text" name="customer" class="form-control"
                           placeholder="نام و نام خانوادگی را وارد کنید" style="margin-bottom:8px;">
                    <input type="text" name="tel" class="form-control" placeholder="تلفن تماس را وارد کنید"
                           style="margin-bottom:8px;">
                           <input type="text" name="address" class="form-control"
                           placeholder="کد پستی خود را وارد کنید"style="margin-bottom:8px;">
                    <input type="submit" name="saveOrder" class="btn btn-success" value="تایید نهایی سفارش"
                           style="width: 100%;height: 40px;">
                </form>
            </div>
        </div>
<div class="row">
    <div class="col-md-12 col-lg-offset-6" style="margin-right: auto;margin-left: auto">
        <table class="table table-striped">
            <tr>
                <td><h3 style="color: orangered">جمع کل سفارش : </h3></td>
                <td style="color: dodgerblue"><?php echo number_format($sumprice); ?> تومان</td>
            </tr>
        </table>
    </div>
</div>
</div>
</div>
</div>
<?php include ('footer.php'); ?>