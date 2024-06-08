<?php

    include "connect.php";
    
    if( isset($_POST['btn']) ) {
        
        $ten = $_POST['ten_kh'];
        $diachi = $_POST['diachi_kh'];
        $sdt = $_POST['sdt_kh'];
        $email = $_POST['email_kh'];

        $sql = "INSERT INTO khachhang(ten_kh, diachi_kh, sdt_kh, email_kh) VALUE('$ten', '$diachi', '$sdt', '$email')";

        mysqLi_query($conn, $sql);
    }
    if( isset($_POST['btnb']) ) {
        header('location: khachhang.php');
    }
?>

<form action="add_kh.php" method="post" enctype="multipart/form-data">

    <p>Tên</p>
    <input type="text" name="ten_kh">
    <p>Địa chỉ</p>
    <input type="text" name="diachi_kh">
    <p>Số điện thoại</p>
    <input type="text" name="sdt_kh">
    <p>Email</p>
    <input type="text" name="email_kh">
    
    <br>
    <button id="submit" name="btn" style="margin-top: 10px;">Thêm</button>
    <button id="submit" name="btnb" style="margin-top: 10px;margin-left: 30px;">Quay lai</button>
</form>