<?php
require_once '../connectDB/config.php';
?>
<form action="actions.php?add-new-cat" method="post">
</form>

<br>
<div class="card mb-3">
    <div class="card-header text-right">
        لیست سوالات
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table float-right" style="direction: rtl">
                <thead>
                <tr>
                    <th>شناسه</th>
                    <th>متن سوال</th>
                    <th>پاسخ</th>
                    <th>حذف</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $num = 1;
                $cat_query = mysqli_query($connection, "Select * From questions");
                while ($cat_row = mysqli_fetch_array($cat_query)):
                    ?>
                    <tr>
                        <td><?php echo $num++ ?></td>
                        <td><?php echo $cat_row['question_text'] ?></td>
                        <td>
                            <a href="index.php?add-answer&id=<?php echo $cat_row['id'] ?>"
                               class="btn btn-success btn-lg">پاسخ</a>
                        </td>
                        <td>
                            <a href="delete-answer.php?qid=<?php echo $cat_row['id'] ?>"
                               class="btn btn-danger btn-lg">حذف</a>
                        </td>
                    </tr>
                <?php
                endwhile;
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<!-- table list -->
