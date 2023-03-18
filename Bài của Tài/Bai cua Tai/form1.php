<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Thêm mới thành viên</h1>
<body>
    <form enctype="multipart/form-data" action="" method="post">
        Tai khoan:<input type="text" name="taikhoan">
        <br>
        <br>
       Mat khau: <input type="text" name="matkhau">
        <br>
        <br>
       Ghi chu: <input type="text" name="ghichu">
        <br>
        <br>
       Avatar:<input type="file" name="avatar">
        <button type="submit " name="btn">Thêm mới</button>
    </form>
    <?php 
    include "connect.php";
    if(isset($_POST['btn'])){
        $tk=$_POST['taikhoan'];
        $mk=$_POST['matkhau'];
        $gc=$_POST['ghichu'];
        
    if(isset($_FILES['avatar'])){
        $file1=$_FILES['avatar'];
        $file2=$file1['name'];
        move_uploaded_file($file1['tmp_name'],$file2);
    }
    $insert="INSERT INTO thanhvien(taikhoan,matkhau,ghichu,avatar) VALUES ('$tk','$mk','$gc','$file2')";
    if (mysqLi_query($conn,$insert)){
        header('location:show.php');
    }
    }
    ?>
</body>
</html>