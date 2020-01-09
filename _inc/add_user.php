<?php
include_once "config.php";

 $errors=[
    'name' => "Please insert your name",
    'email' => "Please enter valid email",
    'password' => "Please insert strong password with at least 8 characters",
    'confirm' => "Please confirm password",
];
$err=0;


 print_r($_POST['reg_user']);
if (isset($_POST['reg_user'])) {
    if (empty($_POST['name'])) {
        $_SESSION['errname']=$errors['name'];
        $err++;
    }
    if (empty($_POST['email'])) {
        $_SESSION['errmail']=$errors['email'];
        $err++;
    }
    if (strlen($_POST['password'])<8) {
        $_SESSION["errpass"]=$errors['password'];
        $err++;
        header('Location: ../index.php ');
        exit;
    }

    if ($_POST['password'] != $_POST['confirmpassword']) {
        $_SESSION['errconfirm']=$errors['confirm'];
        $err++;
    }

    if ($err == 0) {
        $sql = "INSERT INTO users(name, email, password)
                VALUES(:name, :email, :password)";
        $stmt = $db->prepare($sql);
        $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt->execute(array(':name' => $_POST['name'], ':email' => $_POST['email'], ':password' => $hash));
        $result= $stmt->fetch(PDO::FETCH_ASSOC);
    
      if ($stmt) {


          
          $_SESSION['email']=$_POST['email'];

          print_r($_SESSION['email']);
            header('Location: ../home.php ');
            exit;
        }
     else {
        header('Location: ../index.php ');
        exit;
    }
    
}else {
        header('Location: ../index.php ');
        exit;
}
}
?>