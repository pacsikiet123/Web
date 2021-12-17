<?php
    if(isset($_GET['option'])){
        switch($_GET['option']){
            case 'product':
                include"./product.php";
                break;
        }
    }
?>