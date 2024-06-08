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
        <?php   
            include("connect.php");

            $this_id = $_GET['this_id'];

            $sql = " SELECT * FROM nhacungcap WHERE id_nha_cc = ".$this_id ;

            $query = mysqli_query($conn, $sql);

            $row = mysqli_fetch_assoc($query);

            //khi nhấn nút edit
            if(isset($_POST["btn"])){

                $ten = $_POST['TenNcc'];
                $email = $_POST['EmailNcc'];
                $sdt= $_POST['SdtNcc'];
                $diachi= $_POST['DiaChiNcc'];
                
                $sql = "UPDATE nhacungcap SET ten_nha_cc='$ten',email_nha_cc='$email',sdt_nha_cc='$sdt', dia_chi_nha_cc='$diachi'   WHERE id_nha_cc=".$this_id;
                mysqli_query($conn, $sql);

                header('location:NhaCungCap.php');
            }    
        ?>

        <h1>Sửa nhà cung cấp: <?php echo $row['ten_nha_cc'];?> 
        </h1>
        <form method="post" enctype="multipart/form-data">

            <label>Tên nhà cung cấp</label>
            <input type="text" name="TenNcc" value="<?php echo $row['ten_nha_cc'] ?>">

            <label>Email</label>
            <input type="text" name="EmailNcc" value="<?php echo $row['email_nha_cc'] ?>">

            <label>Số điện thoại</label>
            <input type="text" name="SdtNcc" value="<?php echo $row['sdt_nha_cc'] ?>">

            <label>Địa chỉ</label>
            <input type="text" name="DiaChiNcc" value="<?php echo $row['dia_chi_nha_cc'] ?>">

            <div class="Sua">
                <button id=submit name="btn">Sửa</button>                   
            </div>

        </form>
    </div>
    
</body>
</html>
