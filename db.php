<?php

$connection = mysqli_connect('localhost', 'root', 'root', 'shop');
mysqli_query($connection, "SET NAMES 'utf8'");

if (!$connection) {
    echo'Kết nối không thành công!';
}
?>