<?php 

include_once "config.php";




    if (isset($_POST['task_done'])) {
   
        $done=true;
        $id=$_POST['task_id'];

        $sql = "UPDATE notes SET done=? WHERE id=?";
        $stmt= $db->prepare($sql);
        $stmt->execute([$done, $id]);
        $stmt->execute();
        
        header("Location: ../home.php");

        
    }


?>