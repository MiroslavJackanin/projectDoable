<?php
    include_once "config.php";

    $errors=[];
   
if (!empty($_POST['add_task'])&& !empty($_POST['title'])&& !empty($_POST['message3'] && !empty($_POST['date']))) {

    
/*
    if (empty($_POST['title'])) {array_push($errors, "Please type title");}
    if (empty($_POST['task'])) {array_push($errors, "Empty task is forbidden");}
   if (count($errors)==0) {*/

    $task=htmlspecialchars($_POST['message3']);
    $sql = "INSERT INTO notes (id_user, title, note, category, date, done) 
    VALUES (:id_user,:title,:note,:category,:date, :done)";
    $stmt= $db->prepare($sql);

    $id_user=$db->prepare("SELECT id FROM users WHERE email=:email");
    $id_user->bindParam(':email', $_SESSION['email']);
    $id_user->execute();
    $id=$id_user->fetch();
    // zmenit session email na ID !!!! //////////////////////////

    $stmt->execute(array(':id_user'=>$id['id'],':title'=> $_POST['title'],':note'=> $task,':category'=>1,':date'=> $_POST['date'], ':done'=>false));


    if ($stmt){
        header('Location: ../home.php');
        exit;
    }
}

header('Location: ../home.php');
exit;

?>
