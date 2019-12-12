<?php 
    include_once "_partials/header.php";
    
    if (isset($_GET["edit_item"])) {
        $id=$_GET["edit_id"];
       
        include_once "_inc/config.php";
        $sql="SELECT * FROM notes WHERE id=:id LIMIT 1";
        
        $result=$db->prepare($sql);
        $result->bindParam(':id', $id);
        $result->execute();
        $row= $result ->fetch();

        $title=$row['title'];
        $text=$row['note'];
        $id=$row['id'];
        $date=$row['date'];
    }
 ?>




<form id="edit_form" action="_inc/edit_item.php" style="min-width: 100%" method="post">
    <div class="card text-white bg-dark mb-3 form-content" style="max-width: 30rem; min-height: 20rem;">
        <div class="card-header">
            <div class="row justify-content-between" style="max-width: 436px; margin: 0;">
                <input type="hidden" name="id" value="<?php echo $id ?>" >
                <input type="text" class="form-control" name="title" placeholder="header" value="<?php echo $title ?>" style="max-width: 10rem;">
                <input style="margin: 0 10px 10px 0" class="btn btn-outline-warning" type="date" name="date" value="<?php echo $date; ?>">
            </div>
        </div>
        <div class="card-body">
            <p class="card-text">
                <textarea class="form-control" name="task" rows="3" style="height: 97px;"><?php echo $text?></textarea>
            </p>
        </div>
        <div class="confirm-buttons">
            <input class="btn btn-danger btn-lg add-cancel-btn" type="submit" name="cancel" value="Cancel">
            <input class="btn btn-primary btn-lg add-btn" type="submit" name="edit_task" value="Edit task">
        </div>
    </div>
</form>


    
    
    
   