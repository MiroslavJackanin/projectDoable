<?php include "_partials/header.php"; ?>

<main>
    <div class="container">
        <div class="row" style="justify-content: space-evenly;">
            <div class="col-sm-5">

                <?php
                    include_once '_inc/config.php';
                    include_once 'render.php';
                    
                    if(!empty($_SESSION)){
                      echo $_SESSION['email'];
                    }
                    
                
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

                <?php
                include_once '_inc/config.php';
                include_once 'render.php';

                if(!empty($_SESSION)){
                    echo $_SESSION['email'];
                }


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

            <form id="add-form" action="_inc/add-item.php" method="post">
                <div id="add-form-content" class="card text-white bg-dark mb-3" style="max-width: 30rem; min-height: 20rem;">
                    <div class="card-header">
                        <div class="row justify-content-between" style="max-width: 436px; margin: 0;">
                            <input type="text" class="form-control" name="title" placeholder="header" style="max-width: 10rem;">
                            <div>
                                <button type="button" class="btn btn-outline-success">Primary</button>
                                <button type="button" class="btn btn-outline-warning">Secondary</button>
                            </div>
                        </div>
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
                        <input class="btn btn-primary btn-lg cancel-button" type="submit" name="cancel" value="Cancel">
                        <input class="btn btn-primary btn-lg add-button" type="submit" name="add_task" value="Add task">
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<script>
    let openButton = document.getElementById("nav-add-task");
    let modal = document.querySelector("#add-form")
    let closeButton = document.getElementsByClassName("close-button");

    openButton.onclick = function(){
        modal.style.display = "block"
    }

    closeButton.onclick = function (){
        modal.style.display = "none"
    }

    window.onclick = function (e){
        if(e.target == modal){
            modal.style.display = "none"
        }
    }
</script>

<footer>

</footer>

<?php include "_partials/footer.php";?>