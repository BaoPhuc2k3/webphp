<?php   
    include("connect.php");

    $this_id = $_GET["this_id"];

    $sql = " DELETE FROM sanpham WHERE id_sp= $this_id";

    mysqli_query($conn, $sql);

    header('location:SanPham.php');
?>
