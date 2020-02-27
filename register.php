<?php
require 'libs/main.php';

require 'header.php';
?>

<div class="row register-form">
        <div class="col-md-8 offset-md-2">
            <form class="custom-form" action="register-confirm.php" method="post">
                <h1>Register Form</h1>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">First Name</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" name="firstname" type="text"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Last Name</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control"name="surname" type="text"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">User Name</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" name="username"type="text"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Date Of birth</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" name="dob" type="date"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Email </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" name="email" type="email"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Password </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" name="password" type="password"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">Repeat Password </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" name="passconfirm" type="password"></div>
                </div>
                <div class="form-check"><input class="form-check-input" required type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">I've read and accept the terms and conditions</label></div>
                <button class="btn btn-light submit-button" name="register" type="submit">Submit Form</button></form>
        </div>
    </div>
    <?php
require 'footer.php';
?>