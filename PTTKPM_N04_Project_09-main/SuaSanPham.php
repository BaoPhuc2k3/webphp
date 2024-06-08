<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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
        
        <?php   
            include("connect.php");

            $this_id = $_GET['this_id'];

            $sql = " SELECT * FROM sanpham WHERE id_sp= ".$this_id;

            $query = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($query);

            //khi nhấn nút edit
            if(isset($_POST["btn"])){
                $ten_sp = $_POST['TenSP'];
                
                if (!empty($_FILES['HinhAnh']['name'])) {
                    $anh_sp = $_FILES['HinhAnh']['name'];
                    $anh_tmp_name = $_FILES['HinhAnh']['tmp_name'];
                } else {
                    // Nếu không có ảnh mới, giữ nguyên tên ảnh cũ
                    $anh_sp = $row['anh_sp']; // Gán tên tệp ảnh cũ vào biến
                }

                $mota_sp = $_POST['MoTa'];

                $loai_sp = $_POST['LoaiSP'];

                $gia_ban_sp = $_POST['GiaBan'];

                $gia_nhap_sp = $_POST['GiaNhap'];

                $nha_cung_cap_sp = $_POST['NhaCungCap'];

                $sl_ton = $_POST['SLTon'];
                
                $sl_ton_toithieu = $_POST['SLTonToiThieu'];

                $ngay_nhap = $_POST['NgayNhap'];

                $sql = "UPDATE sanpham SET ten_sp='$ten_sp',anh_sp='$anh_sp',mota_sp='$mota_sp', loai_sp='$loai_sp', gia_ban_sp='$gia_ban_sp', gia_nhap_sp='$gia_nhap_sp',
                nha_cung_cap_sp= '$nha_cung_cap_sp', sl_ton='$sl_ton', sl_ton_toithieu='$sl_ton_toithieu', ngay_nhap='$ngay_nhap' WHERE id_sp=".$this_id;
                mysqli_query($conn, $sql);

                move_uploaded_file($anh_tmp_name, 'images/' . $anh_sp);
                
                header('location:SanPham.php');
            }
        
    
        ?>
        <h1>Sửa sản phẩm: <?php echo $row['ten_sp'];?> 
        </h1>

        <form method="post" enctype="multipart/form-data">
            <label>Tên sản phẩm</label>
            <input type="text" name="TenSP" value="<?php echo $row['ten_sp'] ?>">

            <label>Ảnh</label>
            <span> <img src="images/<?php echo $row['anh_sp']?>" alt="" width="80px" height="80px"></span>
            <input type="file" name="HinhAnh">


            <label>Mô Tả</label>
            <input type="text" name="MoTa" value="<?php echo $row['mota_sp'] ?>">

            <label>Loại sản phẩm</label>
            <input type="text" name="LoaiSP" value="<?php echo $row['loai_sp'] ?>">

            <label>Giá Bán</label>
            <input type="number" name="GiaBan" value="<?php echo $row['gia_ban_sp'] ?>">

            <label>Giá Nhập</label>
            <input type="number" name="GiaNhap" value="<?php echo $row['gia_nhap_sp'] ?>">
            
            <label>Nhà Cung Cấp</label>
            <input type="text" name="NhaCungCap" value="<?php echo $row['nha_cung_cap_sp'] ?>">

            <label>Số lượng tồn</label>
            <input type="number" name="SLTon" value="<?php echo $row['sl_ton'] ?>">

            <label>Số lượng tồn tối thiểu</label>
            <input type="number" name="SLTonToiThieu" value="<?php echo $row['sl_ton_toithieu'] ?>">

            <label>Ngày Nhập</label>
            <input type="date" name="NgayNhap" value="<?php echo $row['ngay_nhap'] ?>">

            <div class="Sua">
                <button id=submit name="btn">Sửa</button>                   
            </div>
        </form>
        
    </div>
</body>
</html>
