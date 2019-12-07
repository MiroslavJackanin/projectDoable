<?php

include_once "config.php";

$errors=[];

$edit = $_POST['edit_task'];
$id = $_POST['id'];
$title = $_POST['title'];
$date=$_POST['date'];
//$category = $_POST['category'];
$task = htmlspecialchars($_POST['task']);
$done=true;

//print_r("toto je idecko ".$id." //toto je nazov ".$title." //toto je text ".$task);
if (isset($_POST['cancel'])) {
    header("Location: ../home.php");
}

if (isset($edit)) {

    if (empty($title)) {
        array_push($errors, "Type some title");
    }
    /*if (empty($category)) {
        array_push($errors, "Choose category");
    }*/
    if (empty($task)) {
        array_push($errors, "Empty task is forbidden");
    }
    if (count($errors) == 0) {

        $sql = "UPDATE notes SET title=?, note=?,date=?, done=? WHERE id=?";
        $stmt= $db->prepare($sql);
        $stmt->execute([$title, $task, $date,$done, $id]);
       /* $sql = "UPDATE notes SET title=$title, note=$task
                WHERE id=$id";

        $stmt = $db->prepare($sql);
      /*  $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        //$stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':task', $task, PDO::PARAM_STR);
*/
        $stmt->execute();

        // vytvorit board.php TABULU ako hlavnu stranku pre tabulu s taskmi !!!
        header("Location: ../home.php");
    }
} 
