<nav class="navbar navbar-expand-lg navbar-dark bg-info fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php"><h3 class="pull-left mt-3">داروخانه آروین </h3><img src="image/logo.png" class="pull-right img-fluid" width="60"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="weblog.php">وبلاگ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="counsel.php">مشاوره</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">ارتباط با ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">درباره ما</a>
                </li>
                <?php if (isset($_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">سبد خرید</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myOrders.php">سفارشات من</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">خوش آمدید: <?=$_SESSION['username']?></a>
                    <li class="nav-item"><a class="nav-link" style="" href="logout.php">خروج</a>
                    </li>

                <?php } else { ?>
                    <li>
                        <a class="nav-link" href="login.php">ورود / ثبت نام</a>
                    </li>
                <?php } ?>
                <li>

                </li>
            </ul>
            <form action="index.php" method="get">
                <div class="input-group" style="margin-top: 11px">
                    <input type="text" name="search" class="form-control"
                           placeholder="کالای خود را جستجو کن ...">
                    <button name="btnSearch" class="btn btn-success btn-sm">جستجو</button>
                </div>
            </form>
        </div>
    </div>
</nav>