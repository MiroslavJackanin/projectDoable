<?php
    include_once "config.php";

    $errors=[];
   
if (!empty($_POST['add_task'])&& !empty($_POST['title'])&& !empty($_POST['message3'])) {

    
/*
    if (empty($_POST['title'])) {array_push($errors, "Please type title");}
    if (empty($_POST['task'])) {array_push($errors, "Empty task is forbidden");}
   if (count($errors)==0) {*/
     $sql = "INSERT INTO notes (id_user, title, note, category) 
    VALUES (:id_user,:title,:note,:category)";
    $stmt= $db->prepare($sql);

    $id_user=$db->prepare("SELECT id FROM users WHERE email=:email");
    $id_user->bindParam(':email', $_SESSION['email']);
    $id_user->execute();
    $id=$id_user->fetch();

    $stmt->execute(array(':id_user'=>$id['id'],':title'=> $_POST['title'],':note'=> $_POST['message3'],':category'=>1));
  

    if ($stmt){
        header('Location: ../index.php');
        exit;
    }
}

header('Location: ../index.php');
exit;

?>
