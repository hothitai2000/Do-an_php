<?php
$conn("localhost","root" ,"","bang_thanhvien");
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