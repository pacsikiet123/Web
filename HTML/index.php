<!DOCTYPE html>
<html>
    <head>
        <title>Shop ThinhVo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./Font/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="./style.css">
    </head>
    <style type="text/css">
        body {
            overflow-x:hidden;
        }
    </style>
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
                    <li class="auth-item"><a href="./Register.php">Đăng ký</a></li>
                    <li class="auth-item"><a href="./Login.php">Đăng nhập</a></li>
                    <li class="auth-item"><a href="">Đăng xuất</a></li>
                </ul>
            </li>
            <li><a class="fas fa-shopping-cart"></a></li>
        </div>
    </header>
    <section id="Img">
        <div class="aspect-ratio-169">
            <img src="./Img/MainImg1.jpg">
            <img src="./Img/MainImg2.jpg">
            <img src="./Img/MainImg3.jpg">
        </div>
    </section>
    <body>
        <script>
            const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
            const imgContainer = document.querySelector('.aspect-ratio-169')
            imgNumber = imgPosition.length
            index = 0
            imgPosition.forEach(function(image,index){
                image.style.left = index*100 +"%"
            })
            function imgImg(){
                index++;
                console.log(index)
                if (index>=imgNumber){
                    index = 0
                }
                imgContainer.style.left = "-"+index*100+"%"    
            }
            setInterval(imgImg,5000)
        </script>
    </body>
</html>