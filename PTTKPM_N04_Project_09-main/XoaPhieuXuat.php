<?php   
    include("connect.php");

    $this_id = $_GET["this_id"];

    $sql = " DELETE FROM phieuxuat WHERE id_phieu_xuat = $this_id";

    mysqli_query($conn, $sql);

    header('location:XuatKho.php');
?>