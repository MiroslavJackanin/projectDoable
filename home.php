<?php include "_partials/header.php";

if (isset($_GET['edit_id'])) {
    echo $id, $title;
}
$t = time();
$curentdate = date("Y-m-d");
// echo $curentdate;
?>

<main>
    <div class="container">
        <div class="row" style="justify-content: space-evenly;">
         <div class="col-sm-5">

                <form action="home.php" method="post" style="margin:0px 10px 10px 0px;">
                    <input style ="margin: 0 10px 0 0"class="btn btn-outline-warning"  type="date" name="date_by_user" onchange="" value=<?php echo $curentdate ?>>
                    <input class="btn btn-outline-success"  type="submit" name="submitdate" value="Submit" id="">
                </form>


                <?php
                include_once '_inc/config.php';
                include_once 'render.php';
                    
                $datebyuser;
                $donetask = 0;
                $tasks = 0;
                // echo $curentdate;

                if (isset($_POST['submitdate'])) {
                    $datebyuser = $_POST['date_by_user'];
                    echo $datebyuser;
                    $result = $db->prepare("SELECT notes.id, title, note, id_user, done, date FROM notes 
                                        JOIN users ON notes.id_user=users.id
                                        WHERE email= :email and date=:date
                                        ORDER BY timestamp desc  ");

                    $result->bindParam(':email', $_SESSION['email']);
                    $result->bindParam(':date', $datebyuser);
                    $result->execute();
                    while ($row = $result->fetch()) {

                        echo renderTask($row['title'], $row['note'], $row['id'], $row['id_user'], $row['date'], $row['done']);
                        if ($row['done'] == true) {
                            $donetask++;
                        }
                        $tasks++;
                    }
                } else {
                    $result = $db->prepare("SELECT notes.id, title, note, id_user, date, done FROM notes 
                            JOIN users ON notes.id_user=users.id
                            WHERE email= :email and date=:date
                            ORDER BY timestamp desc  ");

                    $result->bindParam(':email', $_SESSION['email']);
                    $result->bindParam(':date', $curentdate);
                    $result->execute();
                    while ($row = $result->fetch()) {
                        echo renderTask($row['title'], $row['note'], $row['id'], $row['id_user'], $row['date'], $row['done']);
                        if ($row['done'] == true) {
                            $donetask++;
                        }
                        $tasks++;
                    }
                }


                ?>
         </div>
        
       
            
                
                <?php
                /*echo "Tasks overall: " . $tasks;
                echo "Tasks done: " . $donetask;
                echo "<br>";*/
                
                function calcPercentage($tasks, $donetask)
                {
                    $percentage = 0;
                    if ($tasks == 0) {
                        return $percetage = 0;
                    } else {
                        return $percentage = round((100 / $tasks) * $donetask);
                    }
                }


                echo '<div >';
                echo '<p>'."Tasks for today are done " . calcPercentage($tasks,$donetask) . "%".'</p>';
               if (calcPercentage($tasks,$donetask)==100) {
                echo
                '<div class="success-checkmark" style="margin-top:20px;">
                <div class="check-icon">
                    <span class="icon-line line-tip"></span>
                    <span class="icon-line line-long"></span>
                    <div class="icon-circle"></div>
                    <div class="icon-fix"></div>
                </div>
                </div>
                </div>';
               }else{
                   echo
                '<div class="progress">'
                   . '<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width:'.calcPercentage($tasks, $donetask).'%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                
            
            </div>
            </div>
        </div>';
               };
                
 ?>
            
 
            
            <form id="add-form" class="col-sm-5" action="_inc/add-item.php" style="min-width: 100%" method="post">
                <div class="card text-white bg-dark mb-3 form-content" style="max-width: 30rem; min-height: 20rem;">
                
                    <div class="card-body">
                        <h4 class="card-title">
                            <input type="text" class="form-control" name="title" placeholder="title of your task" style="max-width: 30rem;">
                        </h4>
                        <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>" />
                        <p class="card-text">
                            <textarea class="form-control" name="message3" placeholder="details of your task" rows="3" style="height: 97px;"></textarea>
                        </p>
                    </div>
                    <div class="confirm-buttons">
                        <input class="btn btn-danger btn-lg add-cancel-btn" type="submit" name="cancel" value="Cancel">
                        <input class="btn btn-primary btn-lg add-btn" type="submit" name="add_task" value="Add task">
                    </div>
                </div>
            </form>
    </div>   
    
            <!-- EDIT FORM MODAL -->
            <form id="edit-form" action="_inc/edit_item.php" method="post">
                <div class="card text-white bg-dark mb-3 form-content" style="max-width: 30rem; min-height: 20rem;">

                    <div class="row justify-content-between" style="max-width: 436px; margin: 0;">
                        <input type="text" class="form-control" name="title" placeholder="header" style="max-width: 10rem;">

                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <input type="text" class="form-control" placeholder="title of your task" style="max-width: 30rem;">
                        </h4>
                        <p class="card-text">
                            <textarea class="form-control" name="message3" placeholder="details of your task" rows="3" style="height: 97px;"></textarea>
                        </p>
                    </div>
                    <div class="confirm-buttons">
                        <input class="btn btn-danger btn-lg edit-cancel-btn" type="submit" name="cancel" value="Cancel">
                        <input class="btn btn-primary btn-lg edit-save-btn" type="submit" name="edit-task" value="Save changes">
                    </div>
                </div>
            </form>

            <!-- DELETE FORM MODAL -->
            <form id="delete-form" action="_inc/delete_item.php" method="get">
                <div class="card text-white bg-dark mb-3 form-content" style="min-width: 20rem; max-width: 30rem; min-height: 10rem;">
                    <div class="card-header">
                        <div class="row justify-content-between delete-text" style="max-width: 436px; margin: 0;">Delete this task?
                        </div>
                    </div>
                    <div class="card-body">
                    </div>
                    <div class="confirm-buttons">
                        <input class="btn btn-danger btn-lg delete-cancel-btn" type="submit" name="cancel" value="Cancel">
                        <input class="btn btn-success btn-lg delete-confirm-btn" type="submit" name="delete-task" value="Confirm">
                    </div>
                </div>
            </form>

        </div>
    </div>
  <a class="btn btn-success fa fa-chevron-up" id="scroll-up"></a>
</main>

<script>
    window.onclick = function(f) {
        if ((f.target == addModal) && (addModal.style.display = "block")) {
            addModal.style.display = "none"
        }
        if ((f.target == editModal) && (editModal.style.display = "block")) {
            editModal.style.display = "none"
        }
        if ((f.target == deleteModal) && (deleteModal.style.display = "block")) {
            deleteModal.style.display = "none"
        }
    };

    let addOpenButton = document.getElementById("nav-add-task");
    let addModal = document.querySelector("#add-form");
    let addCancelButton = document.getElementsByClassName("add-cancel-btn");

    addOpenButton.onclick = function() {
        addModal.style.display = "block"
    };

    addCancelButton.onclick = function() {
        addModal.style.display = "none"
    };

    let editOpenButton = document.getElementById("edit-form-btn");
    let editModal = document.querySelector("#edit-form");
    let editCancelButton = document.getElementsByClassName("edit-cancel-btn");

    editOpenButton.onclick = function() {
        editModal.style.display = "block"
    };

    editCancelButton.onclick = function() {
        editModal.style.display = "none"
    };

    let deleteOpenButton = document.getElementById("delete-form-btn");
    let deleteModal = document.querySelector("#delete-form");
    let deleteCancelButton = document.getElementsByClassName("delete-cancel-btn");

    deleteOpenButton.onclick = function() {
        deleteModal.style.display = "block"
    };

    deleteCancelButton.onclick = function() {
        deleteModal.style.display = "none"
    };

    function checkdelete() {
        return confirm("Are you sure to delete this ?")
    }
</script>

<?php include "_partials/footer.php"; ?>