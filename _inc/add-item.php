<?php
    require '../header.php';

    $id = $database->insert('tasks', [
        'text' => $_POST['message3']
    ]);

    if ($id){
        header('Location: http://localhost/projectdoable/index.php');
        die();
    }