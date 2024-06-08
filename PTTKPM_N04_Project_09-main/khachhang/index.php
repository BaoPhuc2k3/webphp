<?php
    include "connect.php";
    
    if(isset($_POST['btn'])){
        $noidung = $_POST['noidung'];
    }
    else{
        echo $noidung = false;
    }
    
    $tables = array(
        "khachhang" => "ten_kh",
        "sanpham" => "ten_sp",
        "nhacungcap" => "ten_ncc"
    );

    $queries = array();

    foreach($tables as $table) {
        $queries[] = "SELECT * FROM {$table} WHERE name LIKE '%{$noidung}%'";
    }

    $sql = implode(" UNION ", $queries);

    $result = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_array($result)){
        echo $row['name'];
    }
?>

<form method="post">
    <input type="text" name="noidung">
    <button type="submit" name="btn">Search</button>
</form>