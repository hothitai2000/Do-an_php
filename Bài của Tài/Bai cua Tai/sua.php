<!doctype html>
<html lang="en">
<head>
    <title>Thông tin nhân viên</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Form Thêm thông tin Nhân viên</h1>
        <form method="post" action="" enctype="multipart/form-data">

            <div class="form-group">
                <label for="">Tài khoản</label>
                <input type="text" id="hoten" class="form-control" name="tk"> <!--  name="hoten" server sẽ nhận -->
            </div>

            <div class="form-group">
                <label for="">Mật khẩu</label>
                <input type="text" id="hoten" class="form-control" name="mk"> <!--  name="hoten" server sẽ nhận -->
            </div>

            <div class="form-group">
                <label for="">Ghi chú</label>
                <input type="text" id="masv" class="form-control" name="ghichu">
            </div>

            <div class="form-group">
                <label for="">Avatar</label>
                <input type="file" id="lop" name="anh">
            </div>
            <button type="submit" class="btn btn-success" name="btn" value="lưu"> Thêm sản phẩm </button>
        </form>
    </div>
    <?php
    include 'connect.php';
    if (isset($_POST["btn"])) {
        $taikhoan = $_POST["tk"];
        $matkhau = $_POST["mk"];
        $ghichu = $_POST["ghichu"];
        $fileHA = $_FILES['anh'];
        $ten_file = $fileHA['name'];
        if (empty($ten_file)) {
            echo "Không để trống file ảnh";
        } else {
            $ketnoi = mysqli_connect("localhost", "root", "", "product") or die("connect fail!");
            $check_manv = "select*from thanhvien where tai_khoan='$taikhoan'";
            $ketqua = mysqli_query($connect, $check_manv);
            $dem = mysqli_num_rows($ketqua);
            if ($dem > 0) {
                echo "Tài khoản đã tôn tại";
            } else {
                $target_path = "image/" . basename($ten_file);
                $sql = "INSERT INTO thanhvien (tai_khoan, passwork, avatar, Ghi_chu) values('$taikhoan', '$matkhau','$target_path','$ghichu')";
               
                if(mysqli_query($ketnoi, $sql)) {
                    if(move_uploaded_file($fileHA['tmp_name'], "image/".$fileHA['name'])) {
                        echo "Thêm mới thành công !";
                    } else {
                        echo "Thêm mới thất bại";
                    }
                } else {
                    echo "Thêm mới thất bại";
                }
            }
        }
    }
    ?>