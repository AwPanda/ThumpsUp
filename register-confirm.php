<!-- Start the registration process -->

<?php

require_once 'libs/main.php';

    if (isset($_POST['register'])) 
    {
        // Register the user
        require_once 'libs/user.php';

        $user = new user();

        $userdetailsarray = array(
            "firstName" => $_POST["firstname"],
            "surName" => $_POST["surname"], 
            "userName" => $_POST["username"], 
            "userDob" => $_POST["dob"], 
            "userEmail" => $_POST["email"], 
            "userPassword" => $_POST["password"],
            "userPassConfirm" => $_POST["passconfirm"], 
        
          );

        $registerUser = $user->register($userdetailsarray);

        if($registerUser == true)
        {
            header("Location: index.php");
        }
        else
        {
            // TODO go to error page
            header("Location: index.php");
        }

    }
    else
    {
        header("Location: register.php");
    }
?>