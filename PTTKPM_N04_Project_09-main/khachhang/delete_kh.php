<?php 

    include "connect.php";  

    $this_id = $_GET["this_id"];

    echo $this_id;

    $sql = "DELETE FROM khachhang WHERE id_kh='$this_id'";

    mysqLi_query($conn, $sql);
    header('location: khachhang.php');
?>