<?php
    include "connect.php";

    $this_id = $_GET['this_id'];

    $sql = "SELECT * FROM khachhang WHERE id_kh= ".$this_id ;

    $query =   mysqLi_query($conn, $sql);

    $row = mysqli_fetch_assoc($query);  

    if(isset($_POST['btn'])){
        
        $ten_kh = $_POST['ten_kh'];
        $diachi = $_POST['diachi_kh'];
        $sdt = $_POST['sdt_kh'];
        $email = $_POST['email_kh'];

        $sql = "UPDATE khachhang SET ten_kh = '$ten_kh', diachi_kh = '$diachi', sdt_kh = '$sdt', email_kh = '$email' WHERE id_kh = ".$this_id;

        mysqLi_query($conn, $sql);
        header('location: khachhang.php');
    }
?>

<h1>Khách Hàng: <?php echo $row['ten_kh'] ?></h1>

<form method="post" enctype="multipart/form-data">
    
    <p>Tên</p>
    <input type="text" name="ten_kh" value="<?php echo $row['ten_kh']?>">
    <p>Địa chỉ</p>
    <input type="text" name="diachi_kh" value="<?php echo $row['diachi_kh']?>">
    <p>Số điện thoại</p>
    <input type="text" name="sdt_kh" value="<?php echo $row['sdt_kh']?>">
    <p>Email</p>
    <input type="text" name="email_kh" value="<?php echo $row['email_kh']?>">
    <br>
    <button name="btn" style="margin-top: 10px;">Sửa </button>
</form>
