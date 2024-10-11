<?php
require_once 'config.php';

class Utiles{
    public static function sanitize($input){
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        return $input;
    }

    public static function redirect($page){
        header('location: ' . BASE_URL . '/' . $page);
    }

    public static function setFlash($nombre, $message){
        if(!empty($_SESSION[$nombre])){
            unset($_SESSION[$nombre]);
        }
        $_SESSION[$nombre] = $message; 
    }

    public static function displayFlash($nombre, $type){
        if(isset($_SESSION[$nombre])){
            echo '<div id="' . $nombre . '" class="alert alert-'.$type.'">'.$_SESSION[$nombre].'</div>';
            unset($_SESSION[$nombre]);
        }
    }

    public static function isLoggedIn(){
        if(isset($_SESSION['usuario'])){
            return true;
        } else {
            return false;
        }
    }
}