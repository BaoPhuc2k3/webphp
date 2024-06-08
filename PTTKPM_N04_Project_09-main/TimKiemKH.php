<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="SanPham.css">
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
        <form class="timkiem" action="TimKiemKH.php" method="post" placeholder="Tìm kiếm">
            <h1>Tìm kiếm Khách hàng</h1>
            <input type ="text" name="noidung">
            <button type="submit" name ="search"><i class="fas fa-search"></i></button>
        </form>
        
        
      
        
        <?php

        if(isset($_POST["search"])){
            $noidung = $_POST['noidung'];
        }else {
            echo $noidung =false;
        }
        ?>



         
    <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tên khách hàng</td>
                    <td>Email </td>
                    <td>Số điện thoại</td>
                    <td>Địa chỉ</td>
                </tr>
            </thead>

            <tbody>
                <?php
                    include("connect.php");

                    $sql = "SELECT * FROM khachhang WHERE ten_kh LIKE '%$noidung%' OR sdt_kh LIKE '%$noidung%' OR dia_chi_kh LIKE '%$noidung%' OR email_kh LIKE '%$noidung%'";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        
                ?>  
                    <tr>
                        <td><?php echo $row['id_kh']?> </td>
                        <td><?php echo $row['ten_kh']?> </td>
                        <td><?php echo $row['email_kh']?> </td>
                        <td><?php echo $row['sdt_kh']?> </td>                
                        <td><?php echo $row['dia_chi_kh']?> </td>
                        <td>
                            <span> <a href="SuaNhaKhachHang.php?this_id=<?php echo $row['id_kh'] ?>"> Sửa   </a></span>
                        </td>
                        <td>
                            <span> <a href="XoaNhaKhachHang.php?this_id=<?php echo $row['id_kh'] ?>"> Xóa </a></span>
                            
                        </td>
                        
                    </tr>

                <?php } ?>
            </tbody>
        </table>
        
    </div>
</body>
</html>