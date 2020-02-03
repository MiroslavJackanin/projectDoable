<?php include "_partials/header.php";

    if (isset($_GET['edit_id'])) {
        echo $id, $title;
    }
    $t = time();
    $curentdate = date("Y-m-d");
    
?>

    <main>
        <div class="container1">
            <div class="rowCol">
            <?php
                if (!isset($_SESSION['date'])) {

                    $_SESSION['date']=$curentdate;
                
                }

            ?>

                <div class="taskCol">

                    <?php
                        include_once '_inc/config.php';
                        include_once 'render.php';

                        $datebyuser;
                        $donetask = 0;
                        $tasks = 0;
                        // echo $curentdate;

                        if (isset($_GET['submitdate'])) {
                            $datebyuser = $_GET['date_by_user'];
                            $_SESSION['date']=$datebyuser;

                            echo '<form class="dateSelector" action="home.php" method="get">'
                                    .'<input style="margin: 0 10px 0 0" class="btn btn-outline-warning" type="date" name="date_by_user" onchange="clickFunction()" value='.$_SESSION['date'].'>'
                                    .'<button class="btn btn-outline-success" style="visibility: hidden" type="submit" name="submitdate" id="submitDate">'.'<span class="fas fa-calendar-alt">'.'</span>'.'</button>'
                                .'</form>';

                            echo '<div class="dateSelected">'.'<span>'.'Showing tasks for: '.'</span>'.$datebyuser.'</div>';

                            $result = $db->prepare("SELECT notes.id, title, note, id_user, done, date FROM notes 
                                                JOIN users ON notes.id_user=users.id
                                                WHERE email= :email and date=:date
                                                ORDER BY timestamp desc  ");

                            $result->bindParam(':email', $_SESSION['email']);
                            $result->bindParam(':date', $_SESSION['date']);
                            $result->execute();
                            while ($row = $result->fetch()) {
                                echo renderTask($row['title'], $row['note'], $row['id'], $row['id_user'], $row['date'], $row['done']);
                                if ($row['done'] == true) {
                                    $donetask++;
                                }
                                $tasks++;
                            }
                        } else {

                            echo '<form class="dateSelector" action="home.php" method="get">'
                                    .'<input style="margin: 0 10px 0 0" class="btn btn-outline-warning" type="date" name="date_by_user" onchange="clickFunction()" value='.$_SESSION['date'].'>'
                                    .'<button class="btn btn-outline-success" style="visibility: hidden" type="submit" name="submitdate" id="submitDate">'.'<span class="fas fa-calendar-alt">'.'</span>'.'</button>'
                                .'</form>';

                            echo '<div class="dateSelected">'.'<span>'.'Showing tasks for: '.'</span>'.$_SESSION['date'].'</div>';

                            $result = $db->prepare("SELECT notes.id, title, note, id_user, date, done FROM notes 
                                    JOIN users ON notes.id_user=users.id
                                    WHERE email= :email and date=:date
                                    ORDER BY timestamp desc  ");

                            $result->bindParam(':email', $_SESSION['email']);
                            $result->bindParam(':date', $_SESSION['date']);
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


                    function calcPercentage($tasks, $donetask)
                    {
                        $percentage = 0;
                        if ($tasks == 0) {
                            return $percetage = 0;
                        } else {
                            return $percentage = round((100 / $tasks) * $donetask);
                        }
                    }

                    if (calcPercentage($tasks,$donetask)!=0) {
                        
                    
                    echo '<div class="taskCol tc">';
                    echo '<p class="taskDoneText">' . "Tasks for today are <span class='text-success'>" . calcPercentage($tasks, $donetask) . "%</span> done " . '</p>';
                    if (calcPercentage($tasks, $donetask) == 100) {
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
                    } else {
                        echo
                            '<div class="progress">'.
                                '<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width:' . calcPercentage($tasks, $donetask) . '%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                             </div>';
                    }
                }

                ?>

            </div>
        </div>
        <a class="btn btn-success fa fa-chevron-up" id="scroll-up"></a>
    </main>
    <form id="add-form" class="col-sm-5" action="_inc/add-item.php" style="min-width: 100%" method="post">
        <div class="card text-white bg-dark mb-3 form-content" style="max-width: 30rem; min-height: 20rem;">

            <div class="card-body">
                <h4 class="card-title">
                    <input type="text" class="form-control" name="title" placeholder="title of your task" style="max-width: 30rem;">
                </h4>
                <input style="margin: 0 10px 10px 0" class="btn btn-outline-warning" type="date" name="date" value="<?php echo date('Y-m-d'); ?>"/>
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

    <script>
        function clickFunction() {
            document.getElementById("submitDate").click();
        }

        window.onclick = function (f) {
            if ((f.target == addModal) && (addModal.style.display = "block")) {
                addModal.style.display = "none"
            }
        };

        let addOpenButton = document.getElementById("nav-add-task");
        let addModal = document.querySelector("#add-form");
        let addCancelButton = document.getElementsByClassName("add-cancel-btn");

        addOpenButton.onclick = function () {
            addModal.style.display = "block"
        };

        addCancelButton.onclick = function () {
            addModal.style.display = "none"
        };

        let editOpenButton = document.getElementById("edit-form-btn");
        let editModal = document.querySelector("#edit-form");
        let editCancelButton = document.getElementsByClassName("edit-cancel-btn");

        function checkdelete() {
            return confirm("Are you sure to delete this ?")
        }
    </script>

<?php include "_partials/footer.php"; ?>