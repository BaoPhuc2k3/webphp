<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="DangNhap.css">
</head>
<body>
   
    <?php
        session_start();

        if (isset($_SESSION["taikhoan"])){
            unset($_SESSION["taikhoan"]);
        }
        header('Location:DangNhap.php');
        
    ?>

   <div class="container-login">
        <h1>Đăng nhập</h1>
        <form action="DangXuat.php" method="post">
            <label>Tên tài khoản</label>
            <input type="text" name="taikhoan" placeholder="Nhập tên tài khoản">

            <label>Mật khẩu</label>
            <input type="password" name="matkhau" placeholder="Nhập mật khẩu">

            <button type="submit" name="dangnhap">Đăng nhập</button>
        </form>
   </div>
</body>
</html>
