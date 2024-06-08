<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="SanPham.css">
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
        <?php   
            include("connect.php");

            $this_id = $_GET['this_id'];

            $sql = " SELECT * FROM khachhang WHERE id_kh = ".$this_id ;

            $query = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($query);

            //khi nhấn nút edit
            if(isset($_POST["btn"])){

                $ten = $_POST['TenKH'];
                $email = $_POST['EmailKH'];
                $sdt= $_POST['SdtKH'];
                $diachi= $_POST['DiaChiKH'];
                
                $sql = "UPDATE khachhang SET ten_kh='$ten',email_kh='$email',sdt_kh='$sdt', dia_chi_kh='$diachi'   WHERE id_kh=".$this_id;
                mysqli_query($conn, $sql);

                header('location:KhachHang.php');
            }    
        ?>

        <h1>Sửa Khách hàng: <?php echo $row['ten_kh'];?> 
        </h1>
        <form method="post" enctype="multipart/form-data">

            <label>Tên khách hàng</label>
            <input type="text" name="TenKH" value="<?php echo $row['ten_kh'] ?>">

            <label>Email</label>
            <input type="text" name="EmailKH" value="<?php echo $row['email_kh'] ?>">

            <label>Số điện thoại</label>
            <input type="text" name="SdtKH" value="<?php echo $row['sdt_kh'] ?>">

            <label>Địa chỉ</label>
            <input type="text" name="DiaChiKH" value="<?php echo $row['dia_chi_kh'] ?>">

            <div class="Sua">
                <button id=submit name="btn">Sửa</button>                   
            </div>

        </form>
    </div>
    
</body>
</html>
