<?php
    // Simple logout script that will redirect us to the index page

    require 'libs/main.php';

    if(isset($_SESSION['loggedin']))
    {

        require 'libs/user.php';

        $lgout = new user();

        $lgoutresult = $lgout->logout();
    }
    else
    {
        // If the user is not logged in redirect to index
        header("location: index.php");
    }
?>