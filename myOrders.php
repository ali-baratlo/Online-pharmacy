<?php
require_once 'connectDB/config.php';
?>
<html lang="en">
<head>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>سفارشات من</title>
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
<form action="" method="post">
    <div class="row container" style="margin-left: auto;margin-right: auto">
        <div class="col-md-10">
            <input type="text" name="txtCode" class="form-control"
                   placeholder="کد پیگیری خود را جهت مشاهده لیست سفارش وارد نمایید...">
        </div>
        <div class="col-md-2">
            <input type="submit" class="btn btn-success" value="پیگیری سفارش" name="searchOrder">
        </div>
    </div>
</form>
<hr>
<br>
<div class="col-sm-12">
    <table class="table table-hover table-striped bg-white">
        <thead>
        <tr class="bg-info text-white" style="font-size: 13px">
            <th>ردیف</th>
            <th>تصویر</th>
            <th>نام محصول</th>
            <th>تعداد</th>
            <th class="text-center">قیمت واحد</th>
            <th class="text-center">قیمت کل</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if (isset($_POST['searchOrder'])) {
        $num = 1;
        $total = 0;
        $code = $_POST['txtCode'];
        $query = mysqli_query($connection, "Select * From orderdetails where trackCode='$code'");
        while ($row = mysqli_fetch_array($query)):
        $total += $row['total'];
        ?>
        <tr style="text-align: center">
            <td class="col-md-1 text-center"><strong><?php echo $num++ ?></strong></td>
            <td class="col-md-1">
            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="uploads/<?php echo $row['image'] ?>"
        style="width: 72px; height: 72px;"></a>

</td>
<td class="col-md-5" style="text-align: center">
    <h4 style="margin-left:10px;" class="media-heading"><a><?php echo $row['nameProduct'] ?></a></h4>
</td>
<td class="col-md-1" style="text-align: center">
    <?php echo $row['quantity'] ?>
</td>
<td class="col-md-1 text-center">
    <strong><?php echo number_format($row['price']) ?></strong></td>
<td class="col-md-1 text-center"><strong><?php echo number_format($row['total']) ?></strong></td>
</tr>
<?php endwhile;
} ?>
</tbody>
</table>
</div>
    <div class="col-md-12">
        <table class="table table-striped">
            <tr>
                <td><h3 style="color: orangered">جمع کل سفارش : </h3></td>
                <td style="color: dodgerblue"><?php
                    if(isset($_POST['searchOrder'])) {
                        echo number_format($total);
                    }
                    else {
                        echo 0;
                    }
                    ?> تومان</td>

            </tr>
        </table>
    </div>
</div>
</div>
</div>
</div>
<?php include ('footer.php'); ?>
