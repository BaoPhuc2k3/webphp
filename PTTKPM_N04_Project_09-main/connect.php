<?php
    $server ='localhost';
    $user ='root';
    $pass='';
    $database='pj09qlhtk';

    $conn = new mysqli($server, $user, $pass, $database);

    if ($conn->connect_error) {
        echo "Connection failed: " . $conn->connect_error;
    }
    else
    {
        echo 'Kết nối không thất bại';
    }
?>