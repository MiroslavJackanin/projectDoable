<?php include "_partials/header.php"; ?>

<main>
    <div class="container">
        <div class="row" style="justify-content: space-evenly;">
            <div class="col-sm-5">

                <?php
                    include_once '_inc/config.php';
                    include_once 'render.php';

                    /*
                    if(!empty($_SESSION)){
                      echo $_SESSION['email'];
                    }
                    */
                
                    $result = $db->prepare("SELECT notes.id, title, note, id_user FROM notes 
                                        JOIN users ON notes.id_user=users.id
                                        WHERE email= :email
                                        ORDER BY date DESC  ");

                                        $result->bindParam(':email', $_SESSION['email']);
                                        $result->execute();
                        while($row= $result ->fetch()){
                            echo renderTask($row['title'],$row['note'], $row['id'], $row['id_user']);
                        }
                        
                ?>
               
            </div>

            <div class="col-sm-5">
            </div>

            <form id="add-form" class="col-sm-5" action="_inc/add-item.php" style="min-width: 100%" method="post">
                <div class="card text-white bg-dark mb-3 form-content" style="max-width: 30rem; min-height: 20rem;">
                    <div class="card-header">
                        <div class="row justify-content-between" style="max-width: 436px; margin: 0;">
                            <input type="text" class="form-control" name="title" placeholder="header" style="max-width: 10rem;">
                           
                        </div>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <input type="text" class="form-control" placeholder="title of your task"  style="max-width: 30rem;">
                        </h4>
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

            <!-- EDIT FORM MODAL -->
            <form id="edit-form" action="_inc/add-item.php" method="post">
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
            <form id="delete-form" method="post">
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
</main>

<script>
    window.onclick = function(f){
        if((f.target == addModal) && (addModal.style.display = "block")){
            addModal.style.display = "none"
        }
        if((f.target == editModal) && (editModal.style.display = "block")){
            editModal.style.display = "none"
        }
        if((f.target == deleteModal) && (deleteModal.style.display = "block")){
            deleteModal.style.display = "none"
        }
    };

    let addOpenButton = document.getElementById("nav-add-task");
    let addModal = document.querySelector("#add-form");
    let addCancelButton = document.getElementsByClassName("add-cancel-btn");

    addOpenButton.onclick = function(){
        addModal.style.display = "block"
    };

    addCancelButton.onclick = function(){
        addModal.style.display = "none"
    };

    let editOpenButton = document.getElementById("edit-form-btn");
    let editModal = document.querySelector("#edit-form");
    let editCancelButton = document.getElementsByClassName("edit-cancel-btn");

    editOpenButton.onclick = function(){
        editModal.style.display = "block"
    };

    editCancelButton.onclick = function(){
        editModal.style.display = "none"
    };

    let deleteOpenButton = document.getElementById("delete-form-btn");
    let deleteModal = document.querySelector("#delete-form");
    let deleteCancelButton = document.getElementsByClassName("delete-cancel-btn");

    deleteOpenButton.onclick = function(){
        deleteModal.style.display = "block"
    };

    deleteCancelButton.onclick = function(){
        deleteModal.style.display = "none"
    };
</script>

<footer>

</footer>

<?php include "_partials/footer.php";?>