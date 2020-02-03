<?php include "_partials/header.php";

if (isset($_GET['edit_id'])) {
    echo $id, $title;
}
$t = time();
?>

    <main>
        <div class="container1">
            <div class="rowCol">

                <div class="taskCol">
                    <?php
                        include_once '_inc/config.php';
                        include_once 'render.php';

                        $result = $db->prepare("SELECT date FROM notes 
                                    JOIN users ON notes.id_user=users.id
                                    WHERE email= :email
                                    ORDER BY timestamp desc LIMIT 1");
                        $result->bindParam(':email', $_SESSION['email']);
                        $result->execute();
                        $dateData = $result->fetch();
                        $date=$dateData['date'];
                        $formatDate=date("Y-m-d");
                        echo '<div style="display: flex; flex-direction: row; align-items: center">'
                                .'<form class="dateSelector" action="home.php" method="get" style="margin-bottom: 0">'
                                    .'<input style="margin: 0 0 0 0; visibility: hidden; display: none" class="btn btn-outline-warning" type="date" name="date_by_user" value='.$dateData['date'].'>'
                                    .'<button class="btn btn-outline-success" style="margin-right: 20px" type="submit" name="submitdate" id="submitDate">'.'<span class="fas fa-calendar-alt">'.'</span>'.'</button>'
                                .'</form>'
                                .'<div class="text-center">'.$formatDate.'</div>'
                            .'</div>'
                            .'<div class="hLine"></div>';

                        $result = $db->prepare("SELECT notes.id, title, note, id_user, date, done FROM notes
                                    JOIN users ON notes.id_user=users.id
                                    WHERE email= :email
                                    ORDER BY timestamp desc  ");

                        $result->bindParam(':email', $_SESSION['email']);
                        //$result->bindParam(':date', $_SESSION['date']);
                        $result->execute();
                        while ($row = $result->fetch()) {
                            if($dateData['date'] !== $row['date']){
                                $dateData['date'] = $row['date'];
                                echo '<div style="display: flex; flex-direction: row; align-items: center">'
                                        .'<form class="dateSelector" action="home.php" method="get" style="margin-bottom: 0">'
                                            .'<input style="margin: 0 0 0 0; visibility: hidden; display: none" class="btn btn-outline-warning" type="date" name="date_by_user" value='.$dateData['date'].'>'
                                            .'<button class="btn btn-outline-success" style="margin-right: 20px" type="submit" name="submitdate" id="submitDate">'.'<span class="fas fa-calendar-alt">'.'</span>'.'</button>'
                                        .'</form>'
                                        .'<div class="text-center">'.$dateData['date'].'</div>'
                                    .'</div>'
                                    .'<div class="hLine"></div>';
                                echo renderTask($row['title'], $row['note'], $row['id'], $row['id_user'], $row['date'], $row['done']);
                            }else{
                                echo renderTask($row['title'], $row['note'], $row['id'], $row['id_user'], $row['date'], $row['done']);
                            }
                        }
                    ?>
                </div>
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

        window.onclick = function (f) {
            if ((f.target === addModal) && (addModal.style.display = "block")) {
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