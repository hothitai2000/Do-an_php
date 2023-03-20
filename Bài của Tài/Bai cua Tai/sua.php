<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "connect.php";
    $id=$_GET["edit"];
    $sql ="SELECT * FROM thanhvien WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    //in danh sách dữ liệu
    $row=mysqli_fetch_assoc($result);
    
   ?>
  <?php

//kiểm tra người dùng submit form 
if(isset($_POST['btn']))
{
    $name=$_POST["taikhoan"];
    $pass=$_POST["matkhau"];
    $note=$_POST["ghichu"];
    $avatar=$_POST["avatar"];
}
$sql="UPDATE thanhvien SET taikhoan='$name',password='$pass',ghichu='$note' ,hinhanh='$avatar' WHERE id=$id";
if(mysqli_query($conn,$sql))
{
    header('location:show.php');
}
else{
    $result="cap nhat thanh cong".mysqli_error($conn);
}

?> 

<form enctype="multipart/form-data" action="sua.php" method="post">
        Tai khoan:<input type="text" name="taikhoan" value="<?php echo $row['taikhoan']?>">
        <br>
        <br>
       Mat khau: <input type="text" name="matkhau" value="<?php echo $row['matkhau']?>>
        <br>
        <br>
       Ghi chu: <input type="text" name="ghichu" value="<?php echo $row['ghichu']?>>
        <br>
        <br>
       Avatar:<img src='<?php echo $row['avatar'] ?>' alt="" width="200px " height="170px">
        <button type="submit " name="btn" value="Sua">Update</button>
    </form>
    
