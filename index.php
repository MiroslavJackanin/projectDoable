<!DOCTYPE html>
<html lang="en" xmlns:margin="http://www.w3.org/1999/xhtml">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="_assets/css/themes/bootstrap.min(0).css">
    <link rel="stylesheet" href="_assets/css/homeCSS.css ?timestamp=<?php echo time() ?>">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./_assets/app.js"></script>

    <title>DOable</title>
</head>
<body>
<main>
    <div class="hWrapper">
        <div class="cssMode bg-success">
            <button type="button" onclick="changeCSS(1)" class="btn btn-primary btn-sm" style="margin-left: 25px; display: block">Night</button>
            <button type="button" onclick="changeCSS(0)" class="btn btn-primary btn-sm" style="margin-left: 10px; display: block">Day</button>
        </div>
        <div id="slide" class="home1">
            <div class="home1.1">
                <span id="font1"></span><span id="font2" class="display-4"><span class="text-success">DO</span>able</span>
                <hr class="my-4">
                <p id="font3">A simple web application for managing your time.</p>
            </div>
            <div id="content" class="home2">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile">Register</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show" id="home">
                        <form class="form" action="_inc/log_user.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <div class="center-button"><button type="submit" class="btn btn-primary" name="log_user">Log in</button></div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <form class="form" action="_inc/add_user.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm password</label>
                                <input type="password" class="form-control" name="confirmpassword" id="exampleInputPassword1" placeholder="Confirm password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I agree to terms and conditions</label>
                            </div>
                            <div class="center-button"><button type="submit" class="btn btn-primary" name="reg_user">Sign up</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>