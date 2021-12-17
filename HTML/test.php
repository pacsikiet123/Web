<?php
   
   $connect = new mysqli('localhost','root','','userdatabse');
   mysqli_set_charset($connect,'utf8');
   $sql="SELECT * FROM `products`";
   $products = mysqli_query($connect, $sql);
   foreach ($products as $product){
      echo $product['name'];
      echo $product['price'];
      echo $product['image'];
   }
   
?>