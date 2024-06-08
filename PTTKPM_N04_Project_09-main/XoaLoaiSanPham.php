<?php   
    include("connect.php");

    $this_id = $_GET["this_id"];

    $sql = " DELETE FROM loaisanpham WHERE id_loai_sp= $this_id";

    mysqli_query($conn, $sql);

    header('location:LoaiSanPham.php');
?>
