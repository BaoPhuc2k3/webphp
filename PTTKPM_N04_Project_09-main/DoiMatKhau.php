<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="DangNhap.css">
</head>
<style>
.dky-qmk {
    display:flex;
    justify-content: space-around;
    margin-top: 20px;
    text-align: none;
    }
</style>
<body>
    <?php
        include("connect.php");
        session_start();
        if(isset($_POST["dangnhap"]) ){
            $taikhoan = $_POST["taikhoan"];
            $matkhau = $_POST["matkhau"];
            
            $sql = "SELECT * FROM thanhvien WHERE taikhoan='$taikhoan' ";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $_SESSION['taikhoan'] = $taikhoan;
                $this_id = $row['id_tk']; // Lấy id_tk từ dữ liệu
                $sql_doimk = "UPDATE thanhvien SET matkhau='$matkhau' WHERE id_tk=".$this_id;
                if (mysqli_query($conn, $sql_doimk)) {
                    header("location:DangNhap.php");
                } else {
                    echo "Lỗi cập nhật mật khẩu: " . mysqli_error($conn);
                }
            } else {    
                echo "Tài khoản không tồn tại";
            }
        }
    ?>

   <div class="container-login">
        <h1>Đổi mật khẩu</h1>
        <form action="DoiMatKhau.php" method="post">
            <label>Tên tài khoản</label>
            <input type="text" name="taikhoan" placeholder="Nhập tên tài khoản">
            
            <label>Mật khẩu mới</label>
            <input type="password" name="matkhau" placeholder="Nhập mật khẩu">

            <button type="submit" name="dangnhap">Đổi mật khẩu</button>
        </form>
        <div class="dky-qmk">
            <div><a href="DangKy.php">Đăng ký</a></div>
            <div><a href="DangNhap.php">Đăng nhập</a></div>
        </div>
   </div>
</body>
</html>


