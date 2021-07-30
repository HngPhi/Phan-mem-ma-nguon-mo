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
        require "connection.php";
        $sql = "SELECT * FROM khachhang";
        $query = mysqli_query($conn, $sql);
        $khachhang = array();
        $temp = TRUE;
        if(mysqli_num_rows($query)>0){
            while($row = mysqli_fetch_array($query)){
                $khachhang[] = $row;
            }
        }
        if(isset($_POST['btnDangNhap'])){
            $error = array();
            if(empty($_POST['username'])){
                $error['username'] = "Không được để trống Username";
            }
            if(empty($_POST['password'])){
                $error['password'] = "Không được để trống Password";
            }
            foreach($khachhang as $item){
                if($item['tenKH'] == $_POST['username'] && $item['password'] == md5($_POST['password'])){
                    $_SESSION['username'] = $_POST['username'];
                    $_SESSION['is_login'] = 1;
                    header("Location: trangchu.php");
                    $temp = TRUE;
                }
            }
            if($temp == FALSE) echo "Đăng nhập thất bại";
        }
    ?>
    <form method="POST">
        <h1>Đăng nhập</h1>
        <label for="username">Tên đăng nhập</label><br>
        <input type="text" id="username" name="username">
        <?php echo isset($error['username']) ? $error['username'] : "" ?><br><br>
        <label for="password">Mật khẩu</label><br>
        <input type="password" id="password" name="password">
        <?php echo isset($error['password']) ? $error['password'] : "" ?><br><br>
        <a href="register.php">Bạn chưa có tài khoản?</a>
        <div class="btnForm"><input type="submit" name="btnDangNhap" value="Đăng nhập"></div>
    </form>
</body>
</html>