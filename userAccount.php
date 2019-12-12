<?php include "_partials/header.php"; ?>

    <div class="acc-change">
        <form class="form acc-change-content" action="_inc/add_user.php" method="post">
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
            <div class="center-button"><button type="submit" class="btn btn-primary" name="reg_user">Save changes</button></div>
        </form>
    </div>

<?php include "_partials/footer.php";?>
