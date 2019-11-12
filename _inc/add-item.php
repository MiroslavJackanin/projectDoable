<?php
    include_once "config.php";

    $errors=[];
    $id="";

//ADD TASK 
/*
if (isset($_POST['add_task'])) {
    $title=mysqli_real_escape_string($database, $_POST['title']);
    $task=mysqli_real_escape_string($database, $_POST['message3']);

    if (empty($title)) {array_push($errors, "Please type title");}
    if (empty($task)) {array_push($errors, "Empty task is forbidden");}
*/
    if (count ($errors)==0) {
       $id = $database->insert('notes', [
        'id_user'=>1,
        'title' => $_POST['title'],
        'note'=>$_POST['message3'],
        'category'=>1
       ]);
    }


    if ($id){
        header('Location: ../index.php');
        die();
    }