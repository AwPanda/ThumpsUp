<?php
require 'libs/main.php';

require 'header.php';


?>

<div class="login-clean">
        <form method="post" action="login-confirm.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-navigate"></i></div>
            <div class="form-group"><input class="form-control" type="text" name="username" placeholder="Username"></div>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" name="login"type="submit">Log In</button>
              <a href="register.php" class="btn btn-primary btn-block">Register</a>
            </div><a class="forgot" href="#">Forgot your email or password?</a>
          </form>
    </div>
<?php
require 'footer.php';
?>