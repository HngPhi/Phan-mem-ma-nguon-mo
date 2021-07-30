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
        require "connection.php";
        if(isset($_POST['btnDangKy'])){
            $error = array();
            if(empty($_POST['username'])){
                $error['username'] = "Không được để trống Username";
            }
            if(empty($_POST['password'])){
                $error['password'] = "Không được để trống Password";
            }
            if(empty($_POST['confirm_password'])){
                $error['confirm_password'] = "Bạn cần xác nhận lại mật khẩu";
            }
            if($_POST['password'] != $_POST['confirm_password']){
                $error['confirm_password'] = "Mật khẩu không khớp";
            }
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            if(empty($error)){
                $sql = "INSERT INTO khachhang (tenKH, password, sdtKH, diaChiKH) VALUES ('$username', '$password', '$phone', '$address')";
                mysqli_query($conn, $sql);
                echo "Đăng ký thành công";
            }
        }
    ?>
    <form method="POST">
        <h1>Đăng ký</h1>
        <label for="username">Tên đăng nhập</label><br>
        <input type="text" id="username" name="username">
        <?php echo isset($error['username']) ? $error['username'] : "" ?><br><br>

        <label for="password">Mật khẩu</label><br>
        <input type="password" id="password" name="password">
        <?php echo isset($error['password']) ? $error['password'] : "" ?><br><br>

        <label for="confirm_password">Xác nhận mật khẩu</label><br>
        <input type="password" id="confirm_password" name="confirm_password">
        <?php echo isset($error['confirm_password']) ? $error['confirm_password'] : "" ?><br><br>

        <label for="phone">SĐT</label><br>
        <input type="text" id="phone" name="phone"><br><br>
        <label for="address">Địa chỉ</label><br>
        <input type="address" id="address" name="address"><br><br>

        <div class="btnForm"><input type="submit" name="btnDangKy" value="Đăng ký"></div>
    </form>
</body>
</html>