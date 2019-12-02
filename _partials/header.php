<?php

$page_name = basename($_SERVER['SCRIPT_NAME'], '.php');
if ($page_name == 'index') $page_name = 'home';
ob_start();
session_start();

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
    <!-- DELETE ECHO TIME IN THE END !!!  ... REFRESHING CSS -->
    <link rel="stylesheet" href="_assets/css/customCSS.css ?timestamp=<?php echo time() ?>">


    <title>DOable</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark justify-content-around">
            <a class="navbar-brand" href="index.php" style="font-size: 50px"><span class="text-success">DO</span>able</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse collapse justify-content-between" id="navbarColor01" style="">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="home.php">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Log In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="nav-tasks" href="index.php">Tasks</a>
                        <span class="nav-link" id="nav-add-task" >+</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php">Sign Up</a>
                    </li>
                </ul>
                <div class="signedin">
                    <?php
                        if (!empty($_SESSION['email'])) {
                            echo '<span>'."Signed in as: ".'<a href="">' . $_SESSION['email']. '</a>'.'</span>' ;
                            echo '<span style="margin: 0 20px 0 20px"><a href="./_inc/logout.php">LOG OUT</a></span>';
                        }
                    ?>
                </div>
            </div>
        </nav>
    </header>