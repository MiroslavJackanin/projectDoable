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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
   
    <!-- DELETE ECHO TIME IN THE END !!!  ... REFRESHING CSS -->
    <link rel="stylesheet" href="_assets/css/customCSS.css ?timestamp=<?php echo time() ?>">


    <title>DOable</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-around">
            <div>
            <a class="navbar-brand" href="./home.php" style="font-size: 50px"><span class="text-success">DO</span>able</a>
            </div>
            <div class="taskButton">
                <a class="btn btn-outline-success btn-lg nav-link" id="nav-tasks" href="home.php">TASKS</a>
                <a class="btn btn-success btn-lg nav-link" id="nav-add-task"><span class="fas fa-plus"></span></a>
            </div>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        
                <div class="signedin">
                    <?php
                        if (!empty($_SESSION['email'])) {
                            echo '<a href="userAccount.php">' . $_SESSION['email']. '</a>';
                            echo '<span style="margin: 0 20px 0 20px"><a href="./_inc/logout.php">LOG OUT</a></span>';
                        }
                    ?>
                </div>
            
        </nav>
    </header>