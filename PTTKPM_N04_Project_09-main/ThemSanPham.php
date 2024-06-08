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
        <h1>Thêm sản phẩm</h1>


        <?php
            include("connect.php");
            
            if( isset($_POST['btn']) ){
                $ten_sp = $_POST['TenSP'];

                // chỉ lấy tên hình ảnh
                $anh_sp = $_FILES['HinhAnh']['name'];
                // lấy đường dẫn ảnh
                $anh_tmp_name = $_FILES['HinhAnh']['tmp_name'];

                $mota_sp = $_POST['MoTa'];

                $loai_sp = $_POST['LoaiSP'];

                $gia_ban_sp = $_POST['GiaBan'];

                $gia_nhap_sp = $_POST['GiaNhap'];

                $nha_cung_cap_sp = $_POST['NhaCungCap'];
                
                $sl_ton_toithieu = $_POST['SLTonToiThieu'];

                $ngay_nhap = $_POST['NgayNhap'];

                if (empty($ten_sp) || empty($anh_sp) || empty($mota_sp) || empty($loai_sp) || empty($gia_ban_sp) || empty($gia_nhap_sp) || empty($nha_cung_cap_sp) || empty($sl_ton_toithieu) || empty($ngay_nhap)) {
                    echo "Vui lòng điền đầy đủ thông tin vào tất cả các trường.";
                } else {
                    // Nếu tất cả các trường đã được điền, thực hiện thêm dữ liệu vào cơ sở dữ liệu
                    $sql = "INSERT INTO sanpham (ten_sp, anh_sp, mota_sp, loai_SP, gia_ban_sp, gia_nhap_sp, nha_cung_cap_sp, sl_ton_toithieu, ngay_nhap)
                        VALUES ('$ten_sp', '$anh_sp', '$mota_sp', '$loai_sp', '$gia_ban_sp', '$gia_nhap_sp', '$nha_cung_cap_sp', '$sl_ton_toithieu', '$ngay_nhap')";
            
                    mysqli_query($conn, $sql);
                    move_uploaded_file($anh_tmp_name, 'images/' . $anh_sp);

                    header("location:SanPham.php");
            
                    // Sau khi thêm dữ liệu thành công, bạn có thể thực hiện chuyển hướng hoặc hiển thị thông báo thành công tại đây
                }

            }
        ?>

            <form action="ThemSanPham.php" method="post" enctype="multipart/form-data">
                <label>Tên sản phẩm</label>
                <input type="text" name="TenSP">

                <label>Ảnh</label>
                <input type="file" name="HinhAnh">

                <label>Mô Tả</label>
                <input type="text" name="MoTa">

                <label>Loại sản phẩm</label>
                <input type="text" name="LoaiSP">

                <label>Giá Bán</label>
                <input type="number" name="GiaBan">

                <label>Giá Nhập</label>
                <input type="number" name="GiaNhap">
                    
                <label>Nhà Cung Cấp</label>
                <input type="text" name="NhaCungCap">

                <label>Số lượng tồn tối thiểu</label>
                <input type="number" name="SLTonToiThieu">

                <label>Ngày Nhập</label>
                <input type="date" name="NgayNhap">
            
                <div class="Gui">
                    <button id=submit name="btn">Gửi</button>  
                </div>
            </form> 
    </div>
</body>
</html>
