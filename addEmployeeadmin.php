<?php
    $_POST['hiredate'];
    $_POST['hiretodate'];
    $_POST['userid'];
    $_POST['roleid'];

    require_once 'libs/user.php';

    $user = new user();

    $result = $user->addEmployeeAdmin($_POST['userid'], $_POST['hiredate'], $_POST['hiretodate'], $_POST['roleid']);

    header("Location: admindashboard.php");


?>