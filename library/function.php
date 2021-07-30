<?php
    require("connection.php");
    function general($sql){
        global $conn;
        $query = mysqli_query($conn, $sql);
        // var_dump($query);
        $arr = array();
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_array($query)){
                $arr[] = $row;
            }
        }
        return $arr;
    }

    function getPhanLoai(){
        $sql = "SELECT * FROM phanloaisp";
        return $arr[] = general($sql); 
    }

    function getSanPham(){
        $sql = "SELECT * FROM sanpham";
        return $arr[] = general($sql); 
    }

    function getSanPhamById($id){
        $sql = "SELECT * FROM sanpham WHERE id={$id}";
        return $arr[] = general($sql); 
    }
    
    function getDanhMucById($id){
        $sql = "SELECT * FROM phanloaisp WHERE id={$id}";
        return $arr[] = general($sql); 
    }
?>