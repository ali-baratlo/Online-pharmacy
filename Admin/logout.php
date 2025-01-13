<?php
require_once '../connectDB/config.php';

unset($_SESSION['admin']);
session_destroy();
header('location:../index.php');
?>
