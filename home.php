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
            </div>

            <form id="add-form" class="col-sm-5" action="_inc/add-item.php" method="post">
                <div class="card text-white bg-dark mb-3" style="max-width: 30rem; min-height: 20rem;">
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
                    <input class="btn btn-primary btn-lg btn-block" type="submit" name="add_task" value="Add task">
                </div>
            </form>
        </div>
    </div>
</main>

<footer>

</footer>

<?php include "_partials/footer.php";?>