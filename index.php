<?php error_reporting(0); ?>
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
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" checked>
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                           
                            <?php if (isset($_GET['message']) && !empty($_GET['message']) && $_SERVER['REQUEST_METHOD'] === 'GET') { 

                                    if ($_GET['message'] == 1) {
                                        echo "<div class='alert alert-danger' role='alert'>".
                                            "Account not found".
                                            "</div>";

                                    } elseif ( $_GET['message'] == 2) {
                                        echo "<div class='alert alert-danger' role='alert'>".
                                            "Wrong password".
                                            "</div>";
}
                                    } ?> 

                          
                                   
                            <div class="center-button"><button type="submit" class="btn btn-primary" name="log_user">Log in</button></div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile">
                        <form class="form" action="_inc/add_user.php" method="post">
                       
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
                                
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password" required>
                               
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Confirm password</label>
                                <input type="password" class="form-control" name="confirmpassword" id="exampleInputPassword1" placeholder="Confirm password" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1">I agree to terms and conditions</label>
                            </div>
                            <?php if (isset($_GET['message']) && !empty($_GET['message']) && $_SERVER['REQUEST_METHOD'] === 'GET') { 

                                        if ($_GET['message'] == 3) {
                                            echo "<div class='alert alert-danger' role='alert'>".
                                                "User with this email already exists".
                                                "</div>";

                                        } elseif ( $_GET['message'] == 4) {
                                            echo "<div class='alert alert-danger' role='alert'>".
                                                "Password must have at least 8 characters".
                                                "</div>";
                                        } elseif ( $_GET['message'] == 5) {
                                            echo "<div class='alert alert-danger' role='alert'>".
                                                "Password must be same".
                                                "</div>";
                                        } 
                                        } ?> 
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