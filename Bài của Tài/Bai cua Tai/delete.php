<?php
$id=$_GET['delete'];
include "connect.php";
$d= "DELETE FROM thanhvien WHERE id=$id";
mysqLi_query($conn,$d);
    header('location:show.php');

?>