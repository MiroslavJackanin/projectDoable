<?php 

include_once "config.php";
    $errors=[];

    if (isset($_POST['log_user'])) {
        if (empty($_POST['email'])) {
            array_push($errors,"Please insert correct email");
        }
        if (empty($_POST['password'])) {
            array_push($errors, "Please insert your password");
        }

        if (count($errors)==0) {
            $sql="SELECT * FROM users WHERE email = :email AND password = :password";
            
            $hash=password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt=$db->prepare($sql);
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->bindParam(':password', $hash);
            $stmt->execute();

            $_SESSION['email'] = $_POST['email'];  
            session_start();
            header('Location: ../index.php');
            print_r($_POST['email']);
        }
    
    }

?>