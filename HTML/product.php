<?php
    include 'connect_database.php';
    $productid=$_GET['id'];
    $sql="SELECT * FROM `products` WHERE id=$productid";
    $products = mysqli_query($connect_sql, $sql);
?>
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
    <section class="product">
        <div class="container">
        <?php
            $productid=$_GET['id'];
            $sql="SELECT * FROM `products` WHERE id=$productid";
            $products = mysqli_query($connect_sql, $sql);
            foreach ($products as $product){
        ?>
            <div class="product-top-product">
                <p>Trang chủ</p> <span>&#10230;</span> <p>Sản Phẩm</p><span>&#10230;</span><p><?=$product['name']?></p>
            </div>
            <div class="product-content">
                <div class="product-content-left">
                    <div class="product-content-left-main-img">
                        <img src="sp/<?=$product['image']?>">
                    </div>
                    <div class="product-content-left-sub-img">
                        <img src="sp/<?=$product['subimage1']?>">
                        <img src="sp/<?=$product['subimage2']?>">
                        <img src="sp/<?=$product['subimage3']?>">
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?=$product['name']?></h1>
                        <p>Mã: EN-152</p>
                    </div>
        <?php
            }
        ?>
                    <div class="product-content-right-product-price">
                        <p><?=$product['price']?><sup>đ</sup></p>
                    </div>
                    <div class="quantity">
                        <p style="font-weight: bold">Số lượng:</p>
                        <input type="number" min="0" value="0">
                    </div>
                    <p style="color: red">Vui lòng chọn số lượng</p>
                    <div class="product-content-right-button-buy">
                        <button><p>MUA NGAY</p></button>
                        <button><p>THÊM VÀO GIỎ HÀNG</p></button>
                    </div>
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-icon">
                            &#8744;
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="cmt">
            <div class="cmt-left">
                <h1 style="font-size: 30px">Bình luận:</h1>
                <form method="POST" >
                    <section>
                        <textarea name="content" style="width: 85%;" rows="5" class="form-submit-comment" placeholder="Viet comment o day"></textarea>
                    </section>
                    <button style="margin-top:15px" type="submit" value="Submit" class="submit-comment">Submit</button>
                </form>
            </div>
            <div class="cmt-right" style="margin-top: 30px">
                <?php
                    $sql = ("SELECT * FROM user a JOIN comment b ON a.id=b.userid JOIN products c ON b.productid=c.id WHERE productid=".$_GET['id']);
                    $comments= mysqli_query($connect_sql, $sql);
                    foreach($comments as $cmt){
                ?>
                <div class="cmt-item">
                    <li class="cmt-item-fullname"><?=$cmt['fullname']?></li>
                    <li class="cmt-item-date"><?=$cmt['date']?></li>
                    <li class="cmt-item-content"><?=$cmt['content']?></li>
                </div>
                <?php
                    }
                ?>
            </div>
            <?php
                if(isset($_POST['content'])){
                    $content = $_POST['content'];
                    if(isset($_COOKIE['name'])){
                      $emailTmp = explode('@',$_COOKIE['name'])[0].'@gmail.com';
                      $sql="SELECT * FROM `user` WHERE `email` LIKE '$emailTmp'";
                      $user = mysqli_query($connect_sql, $sql);
                      $userid = mysqli_fetch_array($user)['id'];
                      $user = mysqli_query($connect_sql, $sql);
                      $fullname = mysqli_fetch_array($user)['fullname'];
                      $productid=$_GET['id'];
                      $sql1 = "INSERT INTO comment(userid,date,content,fullname,productid) VALUES ($userid,now(), '$content','$fullname',$productid)";
                      $query = mysqli_query($connect_sql, $sql1); 
                      echo "<script>tai_lai_trang();</script>";
                    }
                    else{
                        header("Location: Login.php");
                    }
                }   
            ?>
            
        </section>
    </section>

    <script>
        const mainImg = document.querySelector(".product-content-left-main-img img")
        const subImg = document.querySelectorAll(".product-content-left-sub-img img")
        subImg.forEach(function(imgImp,x){
            imgImp.addEventListener("click",function(){
                mainImg.src = imgImp.src
            })
        })
    </script>
</html>