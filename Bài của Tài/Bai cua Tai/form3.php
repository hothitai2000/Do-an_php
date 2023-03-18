<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<h1>Thêm mới thành viên</h1>
<body>
    <form  action="" method="post" class="box">
    <H1>ĐĂNG NHẬP TÀI KHOẢN</H1>
        <input type="text" placeholder="User" name="taikhoan">
        <input type="password" placeholder="Password" name="matkhau">
        <input type="submit" name="btn" value="ĐĂNG NHẬP">
    </div> 
    </form>
    <?php 
    include "connect.php";
    if(isset($_POST['btn'])){
        $tk=$_POST['taikhoan'];
        $mk=$_POST['matkhau'];

        if ($tk == "" || $mk == "" ) {
			echo "bạn vui lòng nhập đầy đủ thông tin";
		}else{
			//thực hiện việc lưu trữ dữ liệu vào db
		}
        $conn=mysqli_connect("localhost","root","","bang_thanhvien");
        $sql = "SELECT * FROM thanhvien where matkhau ='$mk' AND taikhoan='$tk'";
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result)==1){
           echo "đăng nhập thanh công";
        }

        else {
            echo "lỗi";
        }  
    }
    header('location:show.php');
   
    ?>
</body>
</html>