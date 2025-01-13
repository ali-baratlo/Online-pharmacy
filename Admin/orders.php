<?php
require_once '../connectDB/config.php';
?>
<div class="card mb-3">
    <div class="card-header">
        لیست سفارشات
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table float-right" style="direction: rtl">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام مشتری</th>
                    <th>تلفن</th>
                    <th>آدرس</th>
                    <th>جمع کل سفارش</th>
                    <th>تاریخ سفارش</th>
                    <th>وضعیت سفارش</th>
                    <th>کد پیگیری</th>
                    <th>مشاهده</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $num = 1;
                $query = mysqli_query($connection, "Select * From orders");
                while ($row = mysqli_fetch_array($query)):
                    ?>
                    <tr>
                        <td><?php echo $num++ ?></td>
                        <td><?php echo $row['customer'] ?></td>
                        <td><?php echo $row['tel'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                        <td><?php echo number_format($row['priceCol']) ?></td>
                        <td><?php echo $row['dateOrder'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                        <td><?php echo $row['trackCode'] ?></td>

                        <td>
                            <a href="index.php?orderDT?trackCode=<?php echo $row['trackCode'] ?>" class="btn btn-primary">لیست سفارشات</a>
                        </td>
                    </tr>
                <?php
                endwhile;
                ?>
                <?php

                ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
