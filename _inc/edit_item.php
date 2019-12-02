<?php

include_once "config.php";

$edit = $_POST['edit-item'];
$id = $_POST['id'];
$title = $_POST['title'];
$category = $_POST['category'];
$task = $_POST['task'];

if (isset($edit)) {

    if (empty($title)) {
        array_push($errors, "Type some title");
    }
    if (empty($category)) {
        array_push($errors, "Choose category");
    }
    if (empty($task)) {
        array_push($errors, "Empty task is forbidden");
    }
    if (count($errors) == 0) {

        $sql = "UPDATE notes SET title=':title', category=':category', task=':task'
                WHERE id=$id";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->bindParam(':task', $task, PDO::PARAM_STR);

        $stmt->execute();

        // vytvorit board.php TABULU ako hlavnu stranku pre tabulu s taskmi !!!
        header("Location: ./board.php");
    }
}
