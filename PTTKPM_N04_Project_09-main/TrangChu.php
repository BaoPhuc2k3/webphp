<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="TrangChu.css">
    <link rel="stylesheet" href="SanPham.css">
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
                <li><a href="DangXuat.php" "><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
            </ul>
        </div>
    </div>
    <div class="content">

        <!-- Main content goes here -->
        <form class="timkiem" action="TimKiemSP.php" method="post">
            <h1>Trang chủ</h1>
            <input type ="text" name="noidung" placeholder="Tìm kiếm">
            <button type="submit" name ="search"><i class="fas fa-search"></i></button>
        </form>
        
        <p></p>

        <?php
            session_start();

            if(!isset($_SESSION['taikhoan'])) {
                header('location:DangNhap.php');
            }
        ?>
        
        <?php
            include("connect.php"); // Kết nối đến cơ sở dữ liệu

            $tables = array("sanpham", "nhacungcap", "thanhvien", "loaisanpham", "phieuxuat");
            $counts = array();

            foreach ($tables as $table) {
                // Truy vấn để đếm số lượng từ bảng
                $sql = "SELECT COUNT(*) AS total FROM $table";
                $result = $conn->query($sql);

                if ($result) {
                    $row = $result->fetch_assoc();
                    $counts[$table] = $row['total'];
                } else {
                    $counts[$table] = 0; // Xử lý lỗi nếu có
                }
            }

            $conn->close(); // Đóng kết nối cơ sở dữ liệu
        ?>

            <?php
                include("connect.php");

                $sql = "SELECT * FROM phieuxuat";
                $result = mysqli_query($conn, $sql);
                $TongTienXuat = 0;

                while ($row = mysqli_fetch_array($result)) {
                    $thanh_tien =$row['tong_tien_hang'];
                    $TongTienXuat +=$thanh_tien;
                    
            ?>  
            <?php } ?>

            
            <div class= "box-container">

                <div class="box box1">
                    <a href="SanPham.php">
                        <i class="fa-solid fa-copy"></i>
                        Sản phẩm
                        <div><span><?php echo $counts['sanpham']; ?> </span></div>
                    </a>
                </div>

                <div class="box box2">
                    <a href="NhaCungCap.php">
                        <i class="fa-solid fa-tags"></i>
                        Nhà cung cấp
                        <div><span><?php echo $counts['nhacungcap']; ?> </span></div>
                    </a>
                </div>

                <div class="box box3">
                    <a href="LoaiSanPham.php">
                        <i class="fa-solid fa-list"></i>
                        Loại Sản Phẩm
                        <div><span><?php echo $counts['loaisanpham']; ?> </span></div>
                    </a>
                </div>

                <div class="box box4">
                    <a href="TaiKhoan.php">
                        <i class="fa-solid fa-user"></i> 
                        Tài Khoản
                        <div><span><?php echo $counts['thanhvien']; ?> </span></div>
                    </a>
                </div>

                <div class="box box5">
                    <a href="BaoCao.php">
                        <i class="fa-solid fa-dollar-sign"></i>
                        Sale
                        <div><span><?php echo $TongTienXuat ?></span></div>
                    </a>
                </div>
            </div>

            

            <div>
                
                <table style="width:80%; margin-top:30px";>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Tên sản phẩm</td>
                        <td>Ảnh</td>
                        <td>Mô tả</td>
                        <td>Loại sản phẩm</td>
                        <td>Giá bán</td>
                        <td>Giá nhập</td>
                        <td>Nhà cung cấp</td>
                        <td>Số lượng tồn</td>
                        <td>SL tồn tối thiểu</td>
                        <td>Ngày nhập</td>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        include("connect.php");

                        $sql = "SELECT * FROM sanpham";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_array($result)) {
                            
                    ?>  
                        <tr>
                            <td><?php echo $row['id_sp']?> </td>
                            <td><a href="ChiTietSanPham.php"><?php echo $row['ten_sp']?></a> </td>
                            <td> <img src="images/<?php echo $row['anh_sp']?>" alt=""> </td>
                            <td><?php echo $row['mota_sp']?> </td>
                            <td><?php echo $row['loai_sp']?> </td>
                            <td><?php echo $row['gia_ban_sp']?> </td>
                            <td><?php echo $row['gia_nhap_sp']?> </td>
                            <td><?php echo $row['nha_cung_cap_sp']?> </td>
                            <td><?php echo $row['sl_ton']?> </td>
                            <td><?php echo $row['sl_ton_toithieu']?> </td>
                            <td><?php echo $row['ngay_nhap']?> </td>
                            <td>
                                <span> <a href="SuaSanPham.php?this_id=<?php echo $row['id_sp'] ?>"> Sửa   </a></span>
                            </td>
                            <td>
                                <span> <a href="XoaSanPham.php?this_id=<?php echo $row['id_sp'] ?>"> Xóa </a></span>
                                
                            </td>
                            
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        



        
        
    </div>
</body>
</html>
