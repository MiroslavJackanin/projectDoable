<?php 

    $errors=[];

    if (isset($_POST['log_user'])) {
        if (empty($_POST['email'])) {
            array_push($errors,"Please insert correct email");
        }
        if (empty($_POST['password'])) {
            array_push($errors, "Please insert your password");
        }

        if (count($errors)==0) {
            $name=$_POST['email'];
            $hash=password_hash($_POST['password'], PASSWORD_DEFAULT);
            $result=$db->query("SELECT * FROM users WHERE email='$email' AND password='$hash' ");
            
            $_SESSION['username'] = $_POST['email'];  
            header('location: index.php'); 
        }
    
    }

?>