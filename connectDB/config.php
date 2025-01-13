<?php
session_start();
define("admin_username", "admin");
define("admin_password", "123456");


$connection = mysqli_connect('localhost', 'root', '', 'darokhone');
mysqli_set_charset($connection, "utf8");
