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
    <div id="wp_content">
        <?php
            require "library/header.php";
            $sanPhamById = getSanPhamById(isset($_GET['id']) ? $_GET['id'] : "");
            foreach($sanPhamById as $item){
                echo "<div class='title'>{$item['tenSP']}</div>
                    <div class='description'>{$item['moTaNganSP']}</div>
                    <div class='image'><img src='public/img/{$item['anhSP']}'></div>
                    <div class='content'>{$item['moTaSP']}</div>
                    <div class='price'>Price: <span class='price_text'>{$item['giaSP']} VNĐ</span></div>";
            }
        ?>
    </div>
</body>
</html>