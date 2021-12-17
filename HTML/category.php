<?php
    include 'connect_database.php';
    include 'article.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shop ThinhVo</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./Font/fontawesome-free-5.15.4-web/fontawesome-free-5.15.4-web/css/all.min.css">
        <link rel="stylesheet" href="./style.css">
        <link rel="stylesheet" href="./config.css">
    </head>
    <body>
        <header>
            <div class="Logo">
                <img src="./Logo/logo.png" style="height: 86px; width: 250px;">
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
                        <li class="auth-item"><a href="index.php?logout=true">Đăng xuất</a></li>
                    </ul>
                </li>
                <li><a class="fas fa-shopping-cart"></a></li>
            </div>
        </header>
        
        <section class="category">
            <div class="category-top">
                <div class="category-top-left">
                    <p>Trang chủ</p> <span>&#10230;</span> <p>Sản Phẩm</p>
                </div>
                <div class="category-top-right">
                    <select class="">
                        <option value="">Sắp sếp</option>
                        <option value="">Giá(Cao->thấp)</option>
                        <option value="">Giá(Thấp->Cao)</option>
                        <option value="">Đánh giá cao nhất</option>
                    </select>
                </div>
            </div>
            <div class="category-down">
                <ul class="category-product">
                    <?php
                        $connect = new mysqli('localhost','root','','userdatabse');
                        mysqli_set_charset($connect,'utf8');
                        $sql="SELECT * FROM `products`";
                        $products = mysqli_query($connect, $sql);
                        foreach ($products as $product){
                    ?>
                    <li>
                        <div class="product-item">
                            <div class="product-top">
                                <a href="?option=product&id=<?=$product['id']?>" class="product-thumb">
                                    <img src="sp/<?=$product['image']?>">
                                </a>
                                <a href="?option=product&id=<?=$product['id']?>" class="buy">Mua</a>
                            </div>
                            <div class="product-info">
                                <a href="?option=product&id=<?=$product['id']?>" class="product-name"><?=$product['name']?></a>
                                <a href="?option=product&id=<?=$product['id']?>" class="product-price"><?=$product['price']?><sup>đ</sup></a>
                            </div>
                        </div>
                    </li>
                    <?php
                        }
                    ?>
                </ul>
            </div>
        </section>
        
    </body>
</html>