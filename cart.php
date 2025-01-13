<?php
require_once 'connectDB/config.php';
//cart
$session = $_SESSION;
$cart = [];
foreach ($session as $keySession => $value) {
    if (substr($keySession, 0, 5) == 'cart_') {
        $cart[$keySession] = $value;
    }
}
if(isset($_GET['max'])){
    echo '<script>alert("تعداد سفارش شما بیشتر از موجودی می باشد")</script>';
}
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>سبد خرید</title>
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
    <table class="table table-hover table-striped bg-white" style="font-size: 13px">
        <thead>
        <tr class="bg-info text-white" style="text-align: center">
            <th>ردیف</th>
            <th>تصویر</th>
            <th>نام محصول</th>
            <th>تعداد</th>
            <th class="text-center">قیمت</th>
            <th class="text-center">جمع کل</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $num = 1;
        $sumprice=0;
        foreach ($cart as $item => $values):
        $sumprice+=$values['price'];
        ?>
        <tr style="text-align: center">
            <td class="col-md-1 text-center"><strong><?php echo $num++ ?></strong></td>
            <td class="col-md-1">

                <a class="thumbnail pull-left" href="#"> <img class="media-object"
                                                              src="uploads/<?php echo $values['image'] ?>"
                                                              style="width: 72px; height: 72px;"></a>


    </td>
    <td class="col-md-5" style="text-align: center">
        <h4 style="margin-left:10px;" class="media-heading"><a>                <?php echo $values['name'] ?></a></h4>
    </td>
    <td class="col-md-1" style="text-align: center">
        <?php echo $values['quantity'] ?>
    </td>
    <td class="col-md-1 text-center">
        <strong><?php echo number_format($values['price'] / $values['quantity']) ?></strong></td>
    <td class="col-md-1 text-center"><strong><?php echo number_format($values['price']) ?></strong></td>


    <td class="col-md-1">
        <a href="cartController.php?remove-cart=<?php echo $values['id'] ?>" class="btn btn-danger btn-lg">
            <span>حذف</span>
        </a>

    </td>
    <td class="col-md-1">
        <a href="cartController.php?add-to-cart=<?php echo $values['id'] ?>" class="btn btn-success btn-lg">
            <span class="">
                <i class="glyphicon glyphicon-plus"></i>
            </span>
        </a>
    </td>
    <td class="col-md-1">
        <a href="cartController.php?minus=<?php echo $values['id'] ?>" class="btn btn-warning btn-lg">
            <span class="">
                <i class="glyphicon glyphicon-minus"></i>
            </span>
        </a>
    </td>
    </tr>
<?php
endforeach;
?>
</tbody>
</table>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <tr>
                    <td><h3 style="color: orangered">جمع کل سفارش : </h3></td>
                    <td style="color: dodgerblue"><?php echo number_format($sumprice); ?> تومان</td>
                </tr>
            </table>
            <a href="customer.php" class="btn btn-success" style="margin-right: 10px;width: 20%;height: 35px;">ثبت سفارش</a>
        </div>
    </div>
</div>
    </div>
    </div>
<?php include ('footer.php'); ?>
