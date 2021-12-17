<?php
    function logout() {
        session_start();
        if(isset($_COOKIE['name'])) {
            setcookie("name", "", time() - 60, "/");
        }

        header("Location: ./Login.php");
    }

    function isLogin() {
        session_start();
        if (isset($_COOKIE['name'])) {
            return true;
        }
        return false;
    }


    if(isLogin()) {
        //split string by at sign
        $username = explode("@", $_COOKIE['name'])[0];
        echo "document.getElementById('register_label').classList.add('hidden'); 
        document.getElementById('login_label').classList.add('hidden');
        document.getElementById('username').classList.remove('hidden');
        document.getElementById('username').innerHTML = '<a>{$username}</a>';
        document.getElementById('logout').classList.remove('hidden');";

    } else {
        echo "document.getElementById('register_label').classList.remove('hidden'); 
        document.getElementById('login_label').classList.remove('hidden');
        document.getElementById('logout').classList.add('hidden');";
    }

    if(isset($_GET['logout'])){
        logout();
    }
?>