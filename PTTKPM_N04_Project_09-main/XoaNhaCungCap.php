<?php   
    include("connect.php");

    $this_id = $_GET["this_id"];

    $sql = " DELETE FROM nhacungcap WHERE id_nha_cc= $this_id";

    mysqli_query($conn, $sql);

    header('location:NhaCungcap.php');
?>
