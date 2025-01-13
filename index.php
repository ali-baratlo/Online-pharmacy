<?php
require_once 'connectDB/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>داروخانه آروین</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-rtl.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
</head>
<body>
<?php include('header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-1 mb-3">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="image/banner1.jpg" alt="slider">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="image/banner2.jpg" alt="slider">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="image/banner3.jpg" alt="slider">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="image/banner4.jpg" alt="slider">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <?php include ('menu.php'); ?>
        <div class="col-lg-9">
            <div class="row">
                <?php
                if (isset($_GET['btnSearch'])) {
                    $search = $_GET['search'];
                    $productQuery = mysqli_query($connection, "Select * From Products where title Like '%$search%'");
                } else
                    if (isset($_GET['cat'])) {
                        $cat_id = $_GET['cat'];
                        $productQuery = mysqli_query($connection, "Select * From Products where cat_id='$cat_id'");
                    } else
                        $productQuery = mysqli_query($connection, "Select * From Products");
                while ($productRow = mysqli_fetch_array($productQuery)):
                    ?>
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <a href="single.php?id=<?php echo $productRow['id'] ?>"><img class="card-img-top"
                                                                                         src="uploads/<?php echo $productRow['image'] ?>"
                                                                                         alt=""
                                                                                         style="display: block;width: 70%;margin-right: auto;margin-left: auto;margin-top: 10px;"></a>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <a href="single.php?id=<?php echo $productRow['id'] ?>"><?php echo $productRow['title'] ?></a>
                                </h4>
                                <h3><?php echo number_format($productRow['price']) ?> تومان</h3>
                                <p class="card-text">
                                    <?php ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="single.php?id=<?php echo $productRow['id'] ?>" class="btn btn-success btn-lg"
                                   title="نمایش جزئیات محصول">
                                    <i class="glyphicon glyphicon-list"></i>
                                    جزئیات</a>
                                <?php if(isset($_SESSION['username'])){ ?>
                                    <a href="cartController.php?add-to-cart=<?php echo $productRow['id'] ?>"
                                       class="btn btn-warning btn-lg pull-left">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </a>
                                <?php }else{ ?>
                                    <a href="login.php"
                                       class="btn btn-warning btn-lg pull-left">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </a>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php include ('footer.php'); ?>
