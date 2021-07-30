<?php
    header("Content-type: text/html; charset=utf-8");
    $conn = mysqli_connect("localhost", "root", "", "quanlybanhang");
    mysqli_set_charset($conn, 'UTF8');
    // if(!$conn){
    //     die("Connection failed: ").mysqli_connect_error();
    // }
    // echo "Connected successfully";
    // mysqli_close($conn);
?>