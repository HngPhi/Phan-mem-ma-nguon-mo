<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <?php 
        session_start();
        require('library/function.php');
        $phanLoaiSP = getPhanLoai();
        $sanpham = getSanPham();
        // echo "<pre>";
        // print_r($sanpham);
    ?>
    <div id="wp_header">
        <div id="header">
            <div id="cart"></div>
            <div id="username">
                <?php 
                    if(isset($_SESSION['username'])){
                        echo "<span class='username'>{$_SESSION['username']} </span> | <a href='logout.php'> Đăng xuất</a>";
                    }
                    else echo "<a href='login.php'>Đăng nhập</a>";
                ?>
            </div>
        </div>
        <div id="menu_area">
            <ul id="menu">
                <?php foreach($phanLoaiSP as $item){
                    echo 
                        "<li><a href='danhmucsanpham.php?id={$item['id']}'>{$item['tenPhanLoai']}</a>
                            <ul id='sub_menu'>";
                            foreach($sanpham as $item_sp){
                                if($item_sp['phanLoaiSP'] == $item['id']){
                                    echo "<li><a href='chitietsanpham.php?id={$item_sp['id']}'>{$item_sp['tenSP']}</a></li>";
                                }
                            }
                            echo "</ul>
                        </li>";
                } ?>
            </ul>
        </div>
    </div>
</body>
</html>