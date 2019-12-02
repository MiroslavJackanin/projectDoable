<?php
include_once "config.php";

$errors = [
    'name' => "",
    'email' => "",
    'password' => "",
    'confirm' => "",
];
 print_r($_POST['reg_user']);
if (isset($_POST['reg_user'])) {
    /*if (empty($_POST['name'])) {
        array_push($errors['name'], "Please insert your name");
    }
    if (empty($_POST['email'])) {
        array_push($errors['email'], "Please enter valid email");
    }
    if (empty($_POST['password'])) {
        array_push($errors['password'], "Please insert strong password");
    }

    if ($_POST['password'] != $_POST['confirmpassword']) {
        array_push($errors['confirm'], "Please confirm password");
    }

    if (count($errors) == 0) {*/
        $sql = "INSERT INTO users(name, email, password)
                VALUES(:name, :email, :password)";
        $stmt = $db->prepare($sql);
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->execute(array(':name' => $_POST['name'], ':email' => $_POST['email'], ':password' => $hash));
   }
    
      /*  if ($stmt) {
            header('Location: ../home.php ');
            exit;
        }
    } else {
        header('Location: ../signup.php ');
        exit;
    }*/

?>