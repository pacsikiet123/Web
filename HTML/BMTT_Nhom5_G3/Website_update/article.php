<?php
    if(isset($_GET['option'])){
        switch($_GET['option']){
            case 'product':
                header("Location: product.php?id={$_GET['id']}");
                break;
        }
    }
?>