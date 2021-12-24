<?php 
    session_start();
    if(isset($_COOKIE['name'])){
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./Font/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./config.css">
    </head>
    <style type="text/css" src='config.css'></style>
    <header>
        <div class="Logo">
            <img src="./logo1.png">
        </div>
        <div class ="Menu">
            <li><a href="./index.php">Trang chủ</a></li>
            <li><a href="./category.php">Sản Phẩm</a></li>
            <li><a href="">Khuyến mại</a></li>
            <li><a href="">Liên Hệ</a></li>
            <li><a href="">Thông Tin</a></li>
        </div>
        <div class="Other">
            <li><input placeholder="Tìm kiếm" type="text"><i class="fas fa-search"></i></li>
            <li class="icon-user"><a class="fas fa-user-alt"></a>
                <ul class="auth">
                    <li id ='register_label' class="auth-item"><a href="./Register.php">Đăng ký</a></li>
                    <li id = 'login_label' class="auth-item"><a href="./Login.php">Đăng nhập</a></li>
                    <a href="./information.php"><li id = 'username' class="auth-item hidden"></li></a>
                    <li id = 'logout' class="auth-item hidden"><a href="index.php?logout=true">Đăng xuất</a></li>
                </ul>
            </li>
            <li><a class="fas fa-shopping-cart"></a></li>
        </div>
    </header>
    <body>
        <div class="main">
            <form action="Login.php" method="POST" class="form" id="form-2">
                <h3 class="heading">Đăng nhập</h3>
        
                <div class="spacer"></div>
                <span id='login_error'></span>
                <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input id="email" name="email" type="text" placeholder="VD: thinhvo@gmail.com" class="form-control">
                <span class="form-message"></span>
                </div>
        
                <div class="form-group">
                <label for="password" class="form-label">Mật khẩu</label>
                <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="form-control">
                <span class="form-message"></span>
                </div>
        
                <button type="submit" class="form-submit">Đăng nhập</button>
            </form>    
        </div>
          
    </body>
      <script src="./main.js"></script>
      <script>
        document.addEventListener('DOMContentLoaded', function () {
          // Mong muốn của chúng ta
            Validator({
                form: '#form-2',
                formGroupSelector: '.form-group',
                errorSelector: '.form-message',
                rules: [
                    Validator.isEmail('#email'),
                    Validator.minLength('#password', 6),
                ]
            });
        });
    
      </script>
      <?php
            include 'connect_database.php';
            $email="";
            $password="";


            if(isset($_POST['email'])){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $pass_cryp = md5($password);
                $sql_query = "SELECT * FROM user WHERE email = '$email' AND password = '$pass_cryp'";
                $query_result = mysqli_query($connect_sql, $sql_query);
                $data1 = mysqli_fetch_assoc($query_result);
                
                $checkEmail = mysqli_num_rows($query_result);
                if($checkEmail > 0) {
                    session_start();
                    $_SESSION['email'] = $email;
                    header("Location: index.php");
                    setcookie("name", $email.'|||||'.md5(time()), time() + 3600, "/");
                } else{
                    echo "<script>document.getElementById('login_error').innerHTML='Sai Tài khoản hoặc mật khẩu'</script>";
                }
            }

        ?>   
        <script>
            <?php include './login_out_handle.php'; ?>
        </script>  
</html>
