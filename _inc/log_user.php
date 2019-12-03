<?php 

    require_once "config.php";
    $errors=[];

    if (isset($_POST['log_user'])) {
        if (empty($_POST['email'])) {
            array_push($errors,"Please insert correct email");
        }
        if (empty($_POST['password'])) {
            array_push($errors, "Please insert your password");
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $hash=password_hash($password, PASSWORD_DEFAULT);
        if (count($errors)==0) {
            
            $sql="SELECT * FROM users WHERE email=:email";

            $stmt=$db->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
           /* $stmt->bindValue(':password', $hash, PDO::PARAM_STR);*/
            $stmt->execute();
            $result= $stmt->fetch(PDO::FETCH_ASSOC);
        
           
            if (count($result)>0 && password_verify(htmlspecialchars(trim($_POST['password'])), $result["password"])) {
           
                $_SESSION['email']=$result['email'];
                $_SESSION['id']=$result['id'];

               header("Location:../home.php");
            } else {
                echo " ERROR";
            }
            
            /*print_r($result['email']);
           $count = $stmt->rowCount();
            print_r($count);
       
            /*
            if($count == 1 && !empty($row)) {
        
                $_SESSION['email'] = $_POST['email'];
              // print_r($row);
              header("Location: ../home.php");
          
             
            } else {
              $msg = "Invalid username and password!";
      
           
            
        }
    */
    }
}

?>