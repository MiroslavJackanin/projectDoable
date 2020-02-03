<?php

include_once "config.php";

$edit = $_POST['edit_user'];
$id = $_SESSION['id'];
$name = $_POST['name'];
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];
$confpass=$_POST['confirmpassword'];
$errors=[];

if (isset($edit)) {

    if (empty($name)) {
        array_push($errors, "Name must have min 4 letters");
    }
    if (empty($email)) {
        array_push($errors, "Please enter correct email");
    }
            $userExists="SELECT * FROM users WHERE email=:email";
            $stmt=$db->prepare($userExists);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
            $resultUser= $stmt->fetch(PDO::FETCH_ASSOC);
            if($resultUser['email']===$email){
                array_push($errors, "error");
                header("Location: ../userAccount.php?message=1");
         }

    if (empty($password) || strlen($password)<8) {
        array_push($errors, "Enter password with at least 8 symbols");
        header("Location: ../userAccount.php?message=2");
    }

    if($password!=$confpass){
        array_push($errors,"error");
        header("Location: ../userAccount.php?message=3");
    }

    if (count($errors) == 0) {
        
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET name=?, email=?, password=?
                WHERE id=?";
        $stmt= $db->prepare($sql);
        $stmt->execute([$name, $email, $password, $id]);

        
        $_SESSION['email']=$email;
        header("Location: ../userAccount.php");
    }
}
