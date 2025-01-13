<?php
require_once '../connectDB/config.php';
?>
<div class="card mb-3">
    <div class="card-header">
        لیست پیام ها
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table float-right" style="direction: rtl">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>پیام</th>
                    <th>ایمیل</th>
                    <th>بخش</th>
                    <th>عملیات</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $num = 1;
                $query = mysqli_query($connection, "Select * From comments INNER JOIN `products` ON `comments`.`productid`=`products`.`id` order by `cid` desc");
                while ($row = mysqli_fetch_array($query)):
                    ?>
                    <tr>
                        <td><?php echo $num++ ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['message'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td>
                            <a href="actions.php?delcomments=<?php echo $row['cid'] ?>" class="btn btn-danger">حذف</a>
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
