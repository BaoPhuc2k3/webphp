<?php   
    include("connect.php");

    $this_id = $_GET["this_id"];

    $sql = " DELETE FROM thanhvien WHERE id_tk= $this_id";

    mysqli_query($conn, $sql);

    header('location:TaiKhoan.php');
?>
