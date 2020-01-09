<?php

$page_name = basename($_SERVER['SCRIPT_NAME'], '.php');
if ($page_name == 'index') $page_name = 'home';
ob_start();
session_start();
if (!isset($_SESSION['email'])) {
    
    header("Location: ./index.php");
}

?>
<!DOCTYPE html>
<html lang="en" xmlns:margin="http://www.w3.org/1999/xhtml">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./_assets/css/normalize.css">
    <link rel="stylesheet" href="./_assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">

    <!-- DELETE ECHO TIME IN THE END !!!  ... REFRESHING CSS -->
    <link rel="stylesheet" href="_assets/css/customCSS.css ?timestamp=<?php echo time() ?>">


    <title>DOable</title>
</head>

<body style="padding-top: 154px">
    <header>
        <nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark justify-content-around">
            <a class="navbar-brand" href="home.php" style="font-size: 50px"><span class="text-success">DO</span>able</a>
            <div style="display: flex">
                <div class="taskButton">
                    <a class="btn btn-outline-success btn-lg nav-link" id="nav-tasks" href="tasks.php" style="border-radius: 10px 0 0 10px">ALL</a>
                </div>
                <div class="taskButton">
                    <a class="btn btn-outline-success btn-lg nav-link" id="nav-tasks" href="home.php" style="border-radius: 0 0 0 0">TASKS</a>
                    <a class="btn btn-success btn-lg nav-link" id="nav-add-task"><span class="fas fa-plus"></span></a>
                </div>
            </div>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-between" id="navbarColor01" >
                <ul class="navbar-nav">
                    <li class="signedin">
                        <?php
                            if (!empty($_SESSION['email'])) {
                                echo '<a href="userAccount.php">' . $_SESSION['email']. '</a>';
                                echo '<span><a href="./_inc/logout.php">LOG OUT<span class="fas fa-sign-out-alt" style="margin-left: 10px"></span></a></span>';
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>