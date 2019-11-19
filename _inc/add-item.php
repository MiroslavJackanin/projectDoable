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
    $stmt->execute(array(':id_user'=>1,':title'=> $_POST['title'],':note'=> $_POST['message3'],':category'=>1));
  

    if ($stmt){
        header('Location: ../index.php');
        exit;
    }
}

header('Location: ../index.php');
exit;

?>
