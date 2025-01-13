<?php
include_once 'inc/functions.php';

$qid = $_GET['qid'];


$sql = "delete From questions where id='$qid'";
mysqli_query($connection,$sql);
header('location:index.php?delok');


?>