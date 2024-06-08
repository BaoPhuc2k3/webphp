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
<style>
h4 {
    text-align: center;
}
</style>

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
        <div class="top">
            <form class="timkiem" action="TimKiemPNhap.php" method="post">
                <h1>Báo cáo</h1>
                <input type ="text" name="noidung"  placeholder="Tìm kiếm">
                <button type="submit" name ="search"><i class="fas fa-search"></i></button>
            </form>
        </div>
        
        <p><a href="XuatBaoCao.php">Xuất báo cáo</a></p>
        
        <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Ngày nhập hàng</td>
                <td>Nhà cung cấp</td>
                <td>Tên sản phẩm</td>
                <td>Ảnh</td>
                <td>Mô tả</td>
                <td>Loại sản phẩm</td>
                <td>Giá nhập</td>
                <td>Số lượng</td>
                <td>Thành Tiền</td>
                <td>Người Nhập</td>
                
            </tr>
        </thead>



        <tbody>
            <?php
                include("connect.php");

                $sql = "SELECT * FROM phieunhap";

                $result = mysqli_query($conn, $sql);

                $TongTienNhap = 0;

                while ($row = mysqli_fetch_array($result)) {
                    $thanh_tien =$row['tong_tien_hang'];
                    $TongTienNhap +=$thanh_tien;
                    
            ?>  
                <tr>
                    <td><?php echo $row['id']?> </td>
                    <td><?php echo $row['ngay_nhap']?> </td>
                    <td><a href="NhaCungcap.php"><?php echo $row['nha_cung_cap_sp']?></a> </td>
                    <td><a href="SanPham.php"><?php echo $row['ten_sp']?></a> </td>
                    <td> <img src="images/<?php echo $row['anh_sp']?>" alt=""> </td>
                    <td><?php echo $row['mota_sp']?> </td>
                    <td><?php echo $row['loai_sp']?> </td>
                    <td><?php echo $row['gia_nhap_sp']?> </td>
                    
                    <td><?php echo $row['so_luong']?> </td>

                    <td><?php echo $row['tong_tien_hang']?> </td>
                    <td><?php echo $row['nguoi_nhap']?> </td>
                    <td>
                        <span> <a href="SuaPhieuNhap.php?this_id=<?php echo $row['id'] ?>"> Sửa   </a></span>
                    </td>
                    <td>
                        <span> <a href="XoaPhieuNhap.php?this_id=<?php echo $row['id'] ?>"> Xóa </a></span>
                        
                    </td>
                    
                </tr>



            <?php } ?>
            <h4>Tổng tiền hàng đã nhập : <?php echo $TongTienNhap ?> </h4>

        </tbody>
    </table>



    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Ngày nhập hàng</td>
                <td>Nhà cung cấp</td>
                <td>Tên sản phẩm</td>
                <td>Ảnh</td>
                <td>Mô tả</td>
                <td>Loại sản phẩm</td>
                <td>Giá bán</td>
                <td>Số lượng</td>
                <td>Thành Tiền</td>
                <td>Người Nhập</td>
               
            </tr>
        </thead>

        <tbody>
            <?php
                include("connect.php");

                $sql = "SELECT * FROM phieuxuat";
                $result = mysqli_query($conn, $sql);
                $TongTienXuat = 0;

                while ($row = mysqli_fetch_array($result)) {
                    $thanh_tien =$row['tong_tien_hang'];
                    $TongTienXuat +=$thanh_tien;
                    
            ?>  
                <tr>
                    <td><?php echo $row['id_phieu_xuat']?> </td>
                    <td><?php echo $row['ngay_xuat']?> </td>
                    <td><a href="NhaCungcap.php"><?php echo $row['nha_cung_cap_sp']?></a> </td>
                    <td><a href="SanPham.php"><?php echo $row['ten_sp']?></a> </td>
                    <td> <img src="images/<?php echo $row['anh_sp']?>" alt=""> </td>
                    <td><?php echo $row['mota_sp']?> </td>
                    <td><?php echo $row['loai_sp']?> </td>
                    <td><?php echo $row['gia_ban_sp']?> </td>                
                    <td><?php echo $row['so_luong_xuat']?> </td>
                    <td><?php echo $row['tong_tien_hang']?> </td>
                    <td><?php echo $row['nguoi_xuat']?> </td>
                    <td>
                        <span> <a href="SuaPhieuXuat.php?this_id=<?php echo $row['id_phieu_xuat'] ?>"> Sửa   </a></span>
                    </td>
                    <td>
                        <span> <a href="XoaPhieuXuat.php?this_id=<?php echo $row['id_phieu_xuat'] ?>"> Xóa </a></span>
                        
                    </td>
                    
                </tr>

            <?php } ?>
            <h4>Tổng tiền hàng đã xuất : <?php echo $TongTienXuat ?> </h4>
        </tbody>
    </table>
    
    <?php $LoiNhuan = $TongTienNhap - $TongTienXuat ?>
    <h4>Lợi nhuận :<?php echo $LoiNhuan ?> </h4>
        
    </div>
</body>
</html>
