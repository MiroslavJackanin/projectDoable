<?php
/*
$page_name = basename($_SERVER['SCRIPT_NAME'], '.php');
if ($page_name == 'index') $page_name = 'home';
ob_start();
session_start();*/


?>
<!DOCTYPE html>
<html lang="en" xmlns:margin="http://www.w3.org/1999/xhtml">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="_assets/css/normalize.css">
    <link rel="stylesheet" href="_assets/css/bootstrap.min.css">
    <!-- DELETE ECHO TIME IN THE END !!!  ... REFRESHING CSS -->
    <link rel="stylesheet" href="_assets/css/customCSS.css ?timestamp=<?php echo time() ?>">


    <title>DOable</title>
</head>

<body>
    <header style="position:relative">
        <div class="jumbotron" style="padding-bottom: 32px; margin-bottom: 3px">
            <div class="row text-center align-items-center justify-content-center">
                <div style="width: 10%">
                </div>
                <div style="width: 80%">
                    <h1 class="display-4">
                        <a class="text-success" href="index.php"><span class="text-success lets_make">lets make it </span><span class="text-success">DO</span><span class="text-white">able</span></a>
                    </h1>
                    <p class="lead">Don't leave for tomorrow, what can be done <span class="text-success">NOW!</span></p>
                </div>
                <div class="float-right" style="width: 10%">
                    <form style="display: flex; flex-direction: column">
                        <button class="btn btn-outline-success" type="button"><a href="login.php">Log in</a> </button>
                        <button class="btn btn-sm btn-outline-secondary" type="button"> <a href="signup.php">Sign up</a> </button>
                    </form>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-dark bg-dark" style="position:sticky; top:0; justify-content: center; margin-bottom: 64px">
            <span style="margin: 0 20px 0 20px"><a href="login.php">HOME</a></span>
            <span style="margin: 0 20px 0 20px"><a href="index.php">TASKS</a></span>
            <span style="margin: 0 20px 0 20px"><a href="signup.php">SIGN UP</a></span>
        </nav>
    </header>