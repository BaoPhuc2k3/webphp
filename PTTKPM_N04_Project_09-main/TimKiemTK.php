<!DOCTYPE html>
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
        <form class="timkiem" action="TimKiemTK.php" method="post" placeholder="Tìm kiếm">
            <h1>Tài khoản</h1>
            <input type ="text" name="noidung">
            <button type="submit" name ="search"><i class="fas fa-search"></i></button>
        </form>
        
       
        <p></p>
        
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
                        <td>Tài khoản</td>
                        <td>Mật khẩu</td>
                        <td>Level</td>
                        <td>Ảnh</td>
                        <td>Họ và Tên</td>
                        <td>Năm Sinh</td>
                        <td>Số Điện Thoại</td>
                        <td>Địa Chỉ</td>
                        <td>Sửa</td>
                        <td>Xóa</td>
                    </tr>
                </thead>

                <tbody>
                <?php
                    include "connect.php";
                    $sql = "SELECT * FROM thanhvien WHERE 
                        taikhoan LIKE '%$noidung%' 
                        OR matkhau LIKE '%$noidung%' 
                        OR diachi LIKE '%$noidung%' 
                        OR level LIKE '%$noidung%' 
                        OR hoten LIKE '%$noidung%'
                        OR sdt LIKE '%$noidung%' 
                        OR namsinh LIKE '%$noidung%'";

                    $result = mysqli_query($conn , $sql);

                    while ($row = mysqli_fetch_array($result) ) {             
                ?>  
                        <tr>
                            <td><?php echo $row['id_tk'] ; ?></td>
                            <td><?php echo $row['taikhoan']; ?></td>
                            <td><?php echo $row['matkhau']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                            <td> <img src="images/<?php echo $row['anh_tv']?>" alt=""> </td>
                            <td><?php echo $row['hoten']; ?></td>
                            <td><?php echo $row['namsinh']; ?></td>
                            <td><?php echo $row['sdt']; ?></td>
                            <td><?php echo $row['diachi']; ?></td>
                    
                            <td>
                        <span> <a href="SuaTaiKhoan.php?this_id=<?php echo $row['id_tk'] ?>"> Sửa  </a></span>
                    </td>
                    <td>
                        <span> <a href="XoaTaiKhoan.php?this_id=<?php echo $row['id_tk'] ?>"> Xóa </a></span>
                        
                    </td>
                        </tr>
                        
                    <?php }?>
                </tbody>
        </table>

         

        
    </div>
</body>
</html>
