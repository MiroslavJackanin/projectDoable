<?php include_once "_partials/header.php" ?>

<form class="form" action="_inc/log_user.php" method="get">
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