<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 15px;
            text-align: left;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                include "connect.php";

                // Thêm câu lệnh reset ID vào đây
                $sql_reset = "ALTER TABLE khachhang AUTO_INCREMENT = 1";
                mysqli_query($conn, $sql_reset);

                $sql = "SELECT * FROM khachhang";
                $result = mysqLi_query($conn, $sql);

                while($row = mysqLi_fetch_array($result)){
            ?>
                <tr>
                    <td><?php echo $row['id_kh'] ?></td>
                    <td><?php echo $row['ten_kh'] ?></td>
                    <td><?php echo $row['diachi_kh'] ?></td>
                    <td><?php echo $row['sdt_kh'] ?></td>
                    <td><?php echo $row['email_kh'] ?></td>
                    <td><a href="edit_kh.php?this_id=<?php echo $row['id_kh'] ?>">Sửa</a> | 
                        <a href="delete_kh.php?this_id=<?php echo $row['id_kh'] ?>">Xóa</a></td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <div><a href="add_kh.php">Thêm khách hàng</a></div>

</body>
</html>