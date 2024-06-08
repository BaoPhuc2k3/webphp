<?php   
    include("connect.php");

    $this_id = $_GET["this_id"];

    $sql = " DELETE FROM khachhang WHERE id_kh= $this_id";

    mysqli_query($conn, $sql);

    header('location:KhachHang.php');
?>
