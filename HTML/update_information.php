<?php
    include 'connect_database.php'
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shop ThinhVo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./Font/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./config.css">
        <link rel="stylesheet" href="./style1.css">
    </head>
    <body>
        <header>
            <div class="Logo">
                <img src="./Logo/logo.jpg" style="height: 86px; width: 250px;">
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
                       <a href="./user.php"><li id ='username' class="auth-item hidden"></li></a>
                        <li id = 'logout' class="auth-item hidden"><a href="index.php?logout=true">Đăng xuất</a></li>
                    </ul>
                </li>
                <li><a class="fas fa-shopping-cart"></a></li>
            </div>
        </header>
        <div class="information">
            <div class="information-top">
                <p>Thong tin nguoi dung</p>
            </div>
            <?php
                if(isset($_COOKIE['name'])){
                    $emailTmp = explode('@',$_COOKIE['name'])[0].'@gmail.com';
                    $sql="SELECT * FROM `user` WHERE `email` LIKE '$emailTmp'";
                    $user = mysqli_query($connect_sql, $sql);
                    $userFullname = mysqli_fetch_array($user)['fullname'];
                    $user = mysqli_query($connect_sql, $sql);
                    $userEmail = mysqli_fetch_array($user)['email'];
                }
            ?>  
            <form class="information-down" method='POST'>
                <div class="information-down-information">
                    <p>ho va ten</p>
                    <p class="information-area"><?=$userFullname?></p>
                </div>
                <div class="information-down-information">
                    <p>email</p>
                    <p class="information-area"><?=$userEmail?></p>
                </div>
                <div class="information-down-information">
                    <p>dia chi</p>
                    <input id="address" name="address" type="text" placeholder="VD: nha so 1, duong so 2, phuong so 3" class="information-area"><?=$userEmail?></input>
                </div>
                <div class="information-down-information">
                    <p>so tai khoan</p>
                    <p><input id="reddit" name="reddit" type="text" placeholder="VD: 45466465456" class="information-area" value="<?=$userFullname?>"><?=$userEmail?></p> 
                </div>
                <div class="information-down-information">
                    <p>so dien thoai</p>
                    <input id="phone" name="phone" type="text" placeholder="VD: 00000xxxxx" class="information-area">
                </div>
            </div>
            <button style="margin-top:15px" type="submit" value="Submit" class="submit-comment">Submit</button>
            
        </div>
    </body> 
</html>