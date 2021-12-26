
<!DOCTYPE html>
<html>
    <head>
        <title>Đăng kí</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../assets/Font/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/config.css">
    </head>
    <style type="text/css">
        body {
            overflow-x:hidden;
        }
    </style>
      
    <header>
        <div class="Logo">
          <img src="../assets/Img/logo1.png">
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

        <form action="" method="POST" class="form" id="form-1">
          <h3 class="heading">Đăng ký</h3>
          <span id='Register_finish' style="font-size: 19px; color:green; padding-bottom:4px;"></span>
          <div class="spacer"></div>
  
          <div class="form-group">
            <label for="fullname" class="form-label">Tên đầy đủ</label>
            <input id="fullname" name="fullname" type="text" placeholder="VD: Thinh Vo" class="form-control">
            <span class="form-message"></span>
          </div>
  
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
  
          <div class="form-group">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" type="password" class="form-control">
            <span class="form-message"></span>
          </div>
  
          <button type="submit" class="form-submit">Đăng ký</button>
        </form>
  
    </div>          
      </body>
      <script src="../js/main.js"></script>
      <script>
  
        document.addEventListener('DOMContentLoaded', function () {
          Validator({
            form: '#form-1',
            formGroupSelector: '.form-group',
            errorSelector: '.form-message',
            rules: [
              Validator.isRequired('#fullname', 'Vui lòng nhập tên đầy đủ của bạn'),
              Validator.isEmail('#email'),
              Validator.minLength('#password', 8),
              Validator.isRequired('#password_confirmation'),
              Validator.isConfirmed('#password_confirmation', function () {
                return document.querySelector('#form-1 #password').value;
              }, 'Mật khẩu không chính xác')
            ],
          });
        });
      </script>
      <?php
        $fullname="";
        $email="";
        $password="";
        $conn = new mysqli('localhost','root','','userdatabase');
        mysqli_set_charset($conn,'utf8');
        if(isset($_POST['fullname'])){
          $fullname = $_POST['fullname'];
          $email = $_POST['email'];
          $password = $_POST['password'];
          $pass_cryp = md5($password);
          $sql = "INSERT INTO user(fullname,email,password) VALUES ('$fullname','$email', '$pass_cryp')";
          $query = mysqli_query($conn, $sql);  
          echo "<script>document.getElementById('Register_finish').innerHTML='Bạn đã đăng kí thành công. Vui lòng chuyển qua trang đăng nhập'</script>";
        }   
      ?>
      </script>
      <script>
        <?php include './login_out_handle.php'; ?>
      </script>
      <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
</html>