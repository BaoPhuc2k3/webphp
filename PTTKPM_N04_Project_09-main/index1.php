<?php
    include "connect.php";
    // //tao database
    // $sql = "CREATE DATABASE cosodulieu";
    // // thực thi truy vấn
    // if(mysqli_query($conn, $sql)) {
    //     echo "Tạo database thành công";
    // } else {
    //     echo "Tạo database thất bại";
    // }

    // //tạo bảng
    // $sql = "CREATE TABLE thanhvien (

    //         id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //         taikhoan VARCHAR(30) NOT NULL,
    //         matkhau VARCHAR(30) NOT NULL,
    //         level INT(6)


    // )";
    // //THUC THI TRUY VAN
    // if($conn->query($sql) === TRUE){
    //     echo "tao bang thanh cong"; 
    // }else {
    //     echo "tao bang that bai";
    // }


//     $id ="";
//     $taikhoan = 'admin';
//     $matkhau = '123456';
//     $level = 1;

//     $sql = "INSERT INTO thanhvien (id, taikhoan, matkhau, level)
//     VALUES('$id', '$taikhoan', '$matkhau', '$level') ";

//     mysqli_query($conn, $sql );
// 

       $sql = " SELECT * FROM thanhvien";
       $result = mysqli_query($conn, $sql);

       if ( mysqli_num_rows($result) >0 )
       {
        while ($row = mysqli_fetch_array($result))
        {
            echo $row['id']."-" .$row['taikhoan'] ."-" .$row['matkhau'] ."-" .$row['level'];
            echo '<br>';

        }
       }
?>