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
        <h1>Thêm tài khoản</h1>


        <?php
            include("connect.php");
            
            if( isset($_POST['btn']) ){
                $taikhoan = $_POST['taikhoan'];
                
                $matkhau = $_POST['matkhau'];

                $level = $_POST['level'];

                // chỉ lấy tên hình ảnh
                $anh = $_FILES['HinhAnh']['name'];
                // lấy đường dẫn ảnh
                $anh_tmp_name = $_FILES['HinhAnh']['tmp_name'];

                $hoten = $_POST['hoten'];

                $namsinh = $_POST['namsinh'];

                $sdt = $_POST['sdt'];

                $diachi = $_POST['diachi'];
                             
                if (empty($taikhoan) || empty($matkhau) || empty($level) || empty($anh) || empty($hoten) || empty($namsinh) || empty($sdt) || empty($diachi) ) {
                    echo "Vui lòng điền đầy đủ thông tin vào tất cả các trường.";
                } else {
                    // Nếu tất cả các trường đã được điền, thực hiện thêm dữ liệu vào cơ sở dữ liệu
                    $sql = "INSERT INTO thanhvien (taikhoan, matkhau, level, anh_tv, hoten, namsinh, sdt, diachi)
                        VALUES ('$taikhoan', '$matkhau', '$level', '$anh', '$hoten', '$namsinh', '$sdt', '$diachi')";
            
                    mysqli_query($conn, $sql);
                    move_uploaded_file($anh_tmp_name, 'images/' . $anh);

                    header("location:TaiKhoan.php");           
                    // Sau khi thêm dữ liệu thành công, bạn có thể thực hiện chuyển hướng hoặc hiển thị thông báo thành công tại đây
                }
            }
        ?>

            <form action="ThemTaiKhoan.php" method="post" enctype="multipart/form-data">
                <label>Tên tài khoản</label>
                <input type="text" name="taikhoan">

                <label>Mật khẩu</label>
                <input type="password" name="matkhau">

                <label>Level</label>
                <input type="number" name="level">

                <label>Ảnh</label>
                <input type="file" name="HinhAnh">

                <label>Họ và tên</label>
                <input type="text" name="hoten">

                <label>Năm sinh</label>
                <input type="number" name="namsinh">
                
                <label>Số Điện Thoại</label>
                <input type="number" name="sdt">

                <label>Địa chỉ</label>
                <input type="text" name="diachi">

            
            
                <div class="Gui">
                    <button id=submit name="btn">Thêm</button>  
                </div>
            </form> 
    </div>
</body>
</html>
