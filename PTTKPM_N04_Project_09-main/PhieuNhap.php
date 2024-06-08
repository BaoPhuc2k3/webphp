<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="ThemSanPham.css">
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
        <h1>Phiếu nhập</h1>

        <?php
        include("connect.php");
        
        if (isset($_POST['btn'])) {
            $ngay_nhap = $_POST['NgayNhap'];
            $so_luong_nhap = $_POST['SoLuong'];
            $this_id = $_POST['IdSP'];
            $nguoi_nhap = $_POST['NguoiNhap'];

            // Truy vấn giá nhập sản phẩm
            $sql_sp = "SELECT ten_sp, mota_sp, loai_sp, gia_nhap_sp, nha_cung_cap_sp, anh_sp FROM sanpham WHERE id_sp = $this_id";
            $result_sp = $conn->query($sql_sp);

            if ($result_sp->num_rows > 0) {
                $row_sp = $result_sp->fetch_assoc();
                $ten_sp = $row_sp["ten_sp"];
                $anh_sp = $row_sp["anh_sp"];
                $nha_cung_cap_sp = $row_sp["nha_cung_cap_sp"];
                $mota_sp = $row_sp["mota_sp"];
                $loai_sp = $row_sp["loai_sp"];
                $gia_nhap_sp = $row_sp["gia_nhap_sp"];
                $tong_tien_hang = $so_luong_nhap * $gia_nhap_sp;

                // Kiểm tra các trường thông tin không được bỏ trống
                if (!empty($ngay_nhap) && !empty($so_luong_nhap) && !empty($tong_tien_hang) && !empty($this_id)) {
                    $sql = "INSERT INTO phieunhap (ngay_nhap,so_luong,nguoi_nhap,ten_sp, mota_sp,loai_sp,gia_nhap_sp,tong_tien_hang, nha_cung_cap_sp,anh_sp) 
                    VALUES ('$ngay_nhap','$so_luong_nhap','$nguoi_nhap','$ten_sp','$mota_sp', '$loai_sp','$gia_nhap_sp',' $tong_tien_hang','$nha_cung_cap_sp','$anh_sp')";
                    mysqli_query($conn, $sql);

                    
                    // Cập nhật số lượng mới vào cơ sở dữ liệu
                    $sql_update = "UPDATE sanpham SET sl_ton = sl_ton + $so_luong_nhap  WHERE id_sp = $this_id";
                    if ($conn->query($sql_update) === TRUE) {
                        header("Location: NhapKho.php");
                    } else {
                        echo "Lỗi cập nhật số lượng: " . $conn->error;
                    }
                } else {
                    echo "Vui lòng điền đầy đủ thông tin vào tất cả các trường.";
                }
            } else {
                echo "Không tìm thấy sản phẩm có ID tương ứng.";
            }



        }
        ?>
        <form action="PhieuNhap.php" method="post" enctype="multipart/form-data">
            <label>Ngày Nhập</label>
            <input type="date" name="NgayNhap">

            <label>ID sản phẩm</label>
            <input type="text" name="IdSP">

            <label>Số lượng</label>
            <input type="number" name="SoLuong">

            <label>Người Nhập</label>
            <input type="text" name="NguoiNhap">

            <div class="Gui">
                <button id="submit" name="btn">Nhập</button>
            </div>
        </form>
    </div>
</body>
</html>
