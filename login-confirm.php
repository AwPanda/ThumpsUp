<?php

require_once 'libs/main.php';

// Check to see if user is already logged in 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
  }
  // Check if this is a post call with variable register
  if (isset($_POST['login'])) {
  
    require_once "libs/user.php";
  
    $lc = new user();
  
    // Make an array to store user details from form to pass to the register controller
    $userdetailsarray = array(
      "userName" => $_POST["username"], // User name
      "userPass" => $_POST["password"], // User Pass
    );
  
    $loginResult = $lc->login($userdetailsarray);

    echo $loginResult;

    if($loginResult == true)
    {
        header("Location: index.php");
    }
    else
    {
     
        header("Location: login.php");
    
    }
  
    // Retrieve form input
  //  header("Location: index.php");
  }
?>