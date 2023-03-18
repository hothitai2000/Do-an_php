<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <form action="" method="post">
        <label>Tài khoản</label>
        <br>
        <input type="text" name="name">
        <br>
        <label>Password</label>
        <br>
        <input type="password" name="password">
        <br>
        <br>
        <input type="submit" name="btn">
    </form>
    <?php
    include "connect.php";
    if(isset($_POST['btn'])){
        $name=mysqli_real_escape_string($conn,$_POST['name']);
        $password=mysqli_real_escape_string($conn,$_POST['password']);
        $password=($password);
        $ql= "SELECT * FROM thanhvien WHERE taikhoan='$name' and matkhau='$password'";
        $query =mysqli_query($conn,$ql);
        $num_row=mysqli_num_rows($query);
        if($num_row!=0){
            echo" Bạn đã đăng nhập thành công";

        }
        else{
            echo"Tên hoặc mật khẩu không đúng";
        }

    }
    ?>
</body>
</html>