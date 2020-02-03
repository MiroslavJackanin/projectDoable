<?php
include_once "config.php";

 $errors=[];



 print_r($_POST['reg_user']);
if (isset($_POST['reg_user'])) {
    if (empty($_POST['name'])) {
        array_push($errors);
    }
    if (empty($_POST['email'])) {
        array_push($errors,"error");
    }
    if (strlen($_POST['password'])<8) {
        array_push($errors,"error");

        header("Location: ../index.php?message=4");
        exit;
    }

        $userExists="SELECT * FROM users WHERE email=:email";
        $stmt=$db->prepare($userExists);
        $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
        $stmt->execute();
        $resultUser= $stmt->fetch(PDO::FETCH_ASSOC);
        if($resultUser['email']=== $_POST['email']){
            header("Location: ../index.php?message=3");
        }

    if ($_POST['password'] === $_POST['confirmpassword']) {
       
    

            if (count($errors) == 0) {
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
} else {
    header("Location: ../index.php?message=5");
    exit;
}
}
?>