<?php
require_once '../connectDB/config.php';
?>
<div class="card mb-3">
    <div class="card-header">
        لیست ریز سفارشات
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table float-right" style="direction: rtl">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th></th>
                    <th>نام محصول</th>
                    <th>تعداد</th>
                    <th>قیمت واحد</th>
                    <th>قیمت کل</th>

                </tr>
                </thead>
                <tbody>
                <?php
                if(isset($_GET['orderDT?trackCode'])) {
                    //echo $_GET['orderDT?trackCode'];
                    $tc = $_GET['orderDT?trackCode'];
                }
                $num=1;
                $query=mysqli_query($connection,"Select * From orderdetails where trackCode='$tc'");
                while ($row=mysqli_fetch_array($query)):
                    ?>
                    <tr>
                        <td><?php echo $num++ ?></td>
                        <td><img src="../uploads/<?php echo $row['image'] ?>" style="width: 80px;"></td>
                        <td><?php echo $row['nameProduct'] ?></td>
                        <td><?php echo $row['quantity'] ?></td>
                        <td><?php echo number_format($row['price']) ?></td>
                        <td><?php echo number_format($row['total']) ?></td>
                    </tr>
                <?php
                endwhile;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>