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
        require "library/header.php";
        $sanPham = getSanPham();
        $danhMucById = getDanhMucById($_GET['id']);
    ?>
    <div id="wp_content">
        <?php 
            foreach($danhMucById as $item){
                echo "<span class='tenPhanLoai'><h1>--------------------------------------{$item['tenPhanLoai']}--------------------------------------</h1></span>";
            }
        ?>
        <div class="sanPhamTheoDanhMuc">
            <?php
                foreach($sanPham as $item){
                    if($item['phanLoaiSP'] == $_GET['id'])
                        echo 
                        "<div>
                            <div class='anhTheoDanhMuc'><img src='public/img/{$item['anhSP']}'></div>
                            <div class='infoSPDM'>
                                <div><b>{$item['tenSP']}</b></div>
                                <div>{$item['moTaNganSP']}</div>
                                <div class='d-flex-jb'>
                                    <span>Giá: <span class='price_text'>".number_format($item['giaSP'], 0, ",", ".")." VNĐ</span></span>
                                    <span>Tình trạng: {$item['tinhTrangSP']}</span>
                                </div>
                                <div class='d-flex-jb'>
                                    <div class='addToCart'><a href=''>Thêm vào giỏ</a></div>
                                    <div class='buyBow'><a href=''>Mua ngay</a></div>
                                </div>
                            </div>
                        </div>";
                }
            ?>
        </div>
    </div>
</body>
</html>