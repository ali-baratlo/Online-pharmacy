<?php
require_once '../connectDB/config.php';
if (isset($_GET['add-new-cat'])) {
    $catname = $_POST['catName'];
    $catSave = mysqli_query($connection, "Insert Into category(cat_name) values('$catname')");
    header('Location:index.php?cats');
}

if (isset($_GET['delete-cat'])) {
        $cat_id = $_GET['delete-cat'];
        $catDelete = mysqli_query($connection, "Delete From category where id='$cat_id'");
        header('Location:index.php?cats');
    }


if (isset($_GET['delete-product'])) {
            $product_id = $_GET['delete-product'];
            $productDelete = mysqli_query($connection, "Delete From products where id='$product_id'");
            header('Location:index.php');
        }
if (isset($_GET['add-new-product'])) {
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                $price = $_POST['price'];
                $count = $_POST['count'];
                $cat = $_POST['cat'];
                $image = $_FILES['image']['name'];
                $upload='../uploads/' .basename($image);
                $query = mysqli_query($connection, "Insert Into products(title,image,description,cat_id,price,count) values('$title','$image','$desc','$cat','$price','$count')");
                move_uploaded_file($_FILES['image']['tmp_name'],$upload);
                header('Location:index.php');
            }
if(isset($_GET['edit-product'])){
    $title = $_POST['title'];
    $desc = $_POST['desc'];
    $price = $_POST['price'];
    $count = $_POST['count'];
    $cat = $_POST['cat'];
    $image = $_POST['oldpic'];
    $editid = $_POST['editid'];
    if(!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $upload = '../uploads/' . basename($image);
    }
    $query = mysqli_query($connection, "UPDATE products set `title`='$title',image='$image',description='$desc',cat_id='$cat',price='$price',`count`=$count where `id`='$editid'");
    if(!empty($_FILES['image']['name'])) {
        move_uploaded_file($_FILES['image']['tmp_name'], $upload);
    }
    header('Location:index.php?ok');
}

if (isset($_GET['delcomments'])) {
    $id = $_GET['delcomments'];
    $catDelete = mysqli_query($connection, "Delete From comments where cid='$id'");
    header('Location:index.php?comments=ok');
}
?>

