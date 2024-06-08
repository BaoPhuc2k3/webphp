<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="ThemSanPham.css">
    <link rel="stylesheet" href="add.css">
    <script src="https://kit.fontawesome.com/a5308e13e8.js" crossorigin="anonymous"></script>
    <title>Quản Lý Kho PJ09</title>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h3><a href="TrangChu.php">Quản Lý Kho PJ09</a></h3>
        </div>
        <div class="sidebar-content">
            <ul>
                <li><a href="TrangChu.php"><i class="fa-solid fa-gauge"></i> Trang Chủ</a></li>
                <li><a href="NhapKho.php"><i class="fa-solid fa-right-to-bracket"></i> Nhập Kho</a></li>
                <li><a href="XuatKho.php"><i class="fa-solid fa-right-from-bracket"></i> Xuất Kho</a></li>
                <li><a href="NhaCungCap.php"><i class="fa-solid fa-tags"></i> Nhà cung cấp</a></li>
                <li><a href="LoaiSanPham.php"><i class="fa-solid fa-list"></i> Loại Sản Phẩm</a></li>
                <li><a href="SanPham.php"><i class="fa-solid fa-copy"></i> Sản Phẩm</a></li>
                <li><a href="KhachHang.php"><i class="fa-solid fa-address-card"></i> Khách Hàng</a></li>
                <li><a href="BaoCao.php"><i class="fa-solid fa-chart-simple"></i> Báo Cáo</a></li>
                <li><a href="TaiKhoan.php"><i class="fa-solid fa-user"></i> Tài Khoản</a></li>
                <li><a href="DangNhap.php"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <!-- Main content goes here -->
        

        <?php
            include("connect.php");
            
            if( isset($_POST['btn']) ){

                $ten = $_POST['TenKH'];
                $email = $_POST['EmailKH'];
                $sdt= $_POST['SdtKH'];
                $diachi= $_POST['DiaChiKH'];
            

                if (empty($ten) ) {
                    echo "Vui lòng điền đầy đủ thông tin vào tất cả các trường.";
                } else {
                    // Nếu tất cả các trường đã được điền, thực hiện thêm dữ liệu vào cơ sở dữ liệu
                    $sql = "INSERT INTO khachhang (ten_kh,email_kh,sdt_kh,dia_chi_kh) VALUES ('$ten','$email','$sdt','$diachi')";
            
                    mysqli_query($conn, $sql);

                    header("location:KhachHang.php");
            
                    // Sau khi thêm dữ liệu thành công, bạn có thể thực hiện chuyển hướng hoặc hiển thị thông báo thành công tại đây
                }

            }
        ?>
            <h1>Thêm khách hàng</h1>
            <form  action="ThemKhachHang.php" method="post" enctype="multipart/form-data">
                <label>Tên khách hàng</label>
                <input type="text" name="TenKH">

                <label>Email</label>
                <input type="text" name="EmailKH">

                <label>Số điện thoại</label>
                <input type="text" name="SdtKH" >

                <label>Địa chỉ</label>
                <input type="text" name="DiaChiKH">

                <div class="Gui">
                    <button id=submit name="btn">Thêm</button>  
                </div>
            </form> 
    </div>
</body>
</html>
