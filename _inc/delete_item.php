<?php
include_once "config.php";

if (isset($_GET['id'])) {
    
    

    
        $sql = "DELETE FROM notes WHERE id =  :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);   
        $stmt->execute();

        if ($stmt){
            header('Location: ../index.php');
            exit;
        }print_r($_GET['id']);
    

    
}
