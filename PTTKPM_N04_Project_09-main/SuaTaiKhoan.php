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

        <?php   
            include("connect.php");

            $this_id = $_GET['this_id'];

            $sql = " SELECT * FROM thanhvien WHERE id_tk = ".$this_id ;

            $query = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($query);

            //khi nhấn nút edit
            if(isset($_POST["btn"])){
                $taikhoan = $_POST['taikhoan'];

                $matkhau = $_POST['matkhau'];

                $level = $_POST['level'];

                if (!empty($_FILES['HinhAnh']['name'])) {
                    $anh_sp = $_FILES['HinhAnh']['name'];
                    $anh_tmp_name = $_FILES['HinhAnh']['tmp_name'];
                } else {
                    // Nếu không có ảnh mới, giữ nguyên tên ảnh cũ
                    $anh_sp = $row['anh_tv']; // Gán tên tệp ảnh cũ vào biến
                }

                $hoten = $_POST['hoten'];

                $namsinh = $_POST['namsinh'];

                $sdt = $_POST['sdt'];

                $diachi = $_POST['diachi'];

                $sql = "UPDATE thanhvien SET taikhoan='$taikhoan' , matkhau='$matkhau', level='$level', anh_tv='$anh_sp', hoten='$hoten', namsinh='$namsinh', sdt ='$sdt', diachi ='$diachi'  WHERE id_tk=".$this_id;
                mysqli_query($conn, $sql);

                move_uploaded_file($anh_tmp_name, 'images/' . $anh_sp);
                
                header('location:TaiKhoan.php');
            }
        
    
        ?>

        
        <h1>Sửa tài khoản: <?php echo $row['taikhoan'];?> 
        </h1>

        <form method="post" enctype="multipart/form-data">

            <label>Tài khoản</label>
            <input type="text" name="taikhoan" value="<?php echo $row['taikhoan'] ?>">

            <label>Mật khẩu</label>
            <input type="password" name="matkhau" value="<?php echo $row['matkhau'] ?>">

            <label>Level</label>
            <input type="number" name="level" value="<?php echo $row['level'] ?>">

            <label>Ảnh</label>
            <span> <img src="images/<?php echo $row['anh_tv']?>" alt="" width="80px" height="80px"></span>
            <input type="file" name="HinhAnh">

            <label>Họ và tên</label>
            <input type="text" name="hoten" value="<?php echo $row['hoten'] ?>">

            <label>Năm sinh</label>
            <input type="number" name="namsinh" value="<?php echo $row['namsinh'] ?>">
                
            <label>Số Điện Thoại</label>
            <input type="number" name="sdt" value="<?php echo $row['sdt'] ?>">

            <label>Địa chỉ</label>
            <input type="text" name="diachi" value="<?php echo $row['diachi'] ?>">

            <div class="Gui">
                <button id=submit name="btn">Sửa</button>                 
            </div>
        </form>

        
    </div>

    
</body>
</html>
