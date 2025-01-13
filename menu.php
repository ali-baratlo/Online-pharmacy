<div class="col-md-3 mb-3">

    <div class="card bg-info text-white"><h3 class="my-4 text-center"> دسته بندی داروها</h3></div>
    <div class="list-group">
        <?php
        $catQuery = mysqli_query($connection, "Select * From category");
        while ($catRow = mysqli_fetch_array($catQuery)):
            ?><a href="index.php?cat=<?php echo $catRow['id'] ?>"
                 class="list-group-item"><?php echo $catRow['cat_name'] ?></a>
        <?php endwhile; ?>
    </div>
    <div class="card bg-info mt-4 text-white"><h3 class="my-4 text-center"> آمار بازدید</h3></div>
    <?php include 'counter.php' ?>

</div>
