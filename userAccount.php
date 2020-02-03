<?php include "_partials/header.php"; ?>

    <div class="acc-change" style="min-height:70vh;">
        <form class="form acc-change-content" action="_inc/edit_user.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Change name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Change email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Change password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Confirm password</label>
                <input type="password" class="form-control" name="confirmpassword" id="exampleInputPassword1" placeholder="Confirm password">
            </div>
            <?php if (isset($_GET['message']) && !empty($_GET['message']) && $_SERVER['REQUEST_METHOD'] === 'GET') { 

                    if ($_GET['message'] == 1) {
                        echo "<div class='alert alert-danger' role='alert'>".
                            "User with this email already exists".
                            "</div>";

                    } elseif ( $_GET['message'] == 2) {
                        echo "<div class='alert alert-danger' role='alert'>".
                            "Password must have at least 8 characters".
                            "</div>";
                    } elseif ( $_GET['message'] == 3) {
                        echo "<div class='alert alert-danger' role='alert'>".
                            "Password must be same".
                            "</div>";
                    } 
                    } ?> 
            <div class="center-button"><button type="submit" class="btn btn-primary" name="edit_user">Save changes</button></div>
        </form>
    </div>

<?php include "_partials/footer.php";?>
