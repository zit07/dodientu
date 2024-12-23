<?php

$connection = mysqli_connect('localhost', 'root', '', 'shop');
mysqli_query($connection, "SET NAMES 'utf8'");

if (!$connection) {
    exit('Kết nối không thành công!');
}
?>