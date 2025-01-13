<?php
require_once '../connectDB/config.php';
$query = mysqli_query($connection, "Select * From users");
if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($connection,"delete from `users` where `id`='$id'");
    header('location:index.php?users');
    exit();
}

?>
<div class="card mb-3">
    <div class="card-header">
        لیست کاربران
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table float-right" style="direction: rtl">
                <thead>
                <tr>
                    <th>ردیف</th>
                    <th>نام</th>
                    <th>نام کاربری</th>
                    <th>مدیریت</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $num = 1;
                while ($row = mysqli_fetch_array($query)):
                    ?>
                    <tr>
                        <td><?php echo $num++ ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td>
                            <a href="users.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">حذف</a>
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
