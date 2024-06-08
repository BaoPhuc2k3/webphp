<?php

    $server = 'localhost';
    $user = 'root';
    $pass = '';
    $database = 'quanlykh-user'; 

    $conn = new mysqLi($server, $user, $pass, $database);

    if($conn){
        mysqLi_query($conn, "SET NAMES 'utf8' ");
        
    }
?>
