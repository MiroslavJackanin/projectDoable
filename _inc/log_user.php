<?php 

include_once "config.php";
    $errors=[];

    if (isset($_GET['log_user'])) {
        if (empty($_GET['email'])) {
            array_push($errors,"Please insert correct email");
        }
        if (empty($_GET['password'])) {
            array_push($errors, "Please insert your password");
        }

        if (count($errors)==0) {
            $name=$_GET['email'];
            $hash=password_hash($_GET['password'], PASSWORD_DEFAULT);
            $result=$db->query("SELECT * FROM users WHERE email='$email' AND password='$hash' ");
            
            $_SESSION['username'] = $_GET['name'];  
            print_r($_GET['email']);
        }
    
    }

?>