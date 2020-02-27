<?php

require_once 'dbContext.php';

class user
{

    // User class that holds all functions relative to user
    // Also extends the role class as we might need to do calls to methods to find out information about users role.

    private $db;

    function __construct()
    {
        $sqlConn = new dbContext();

        $this->db = $sqlConn->getConnstring();
    }
    function login($userDetailsArray)
    {

        // validate users details and login if correct
        $username = $userDetailsArray['userName'];
        $plainTextPass = $userDetailsArray['userPass']; // Plain text password to verify hash

        // Get connection string
        $conn = $this->db;
 
        // Use prepared statements for security sanatizing input
        $stmt = $conn->prepare("SELECT userid, username, email, userpass, usertype FROM users where username = ?");
        $stmt->bind_param("s", $username );
        $stmt->execute();

        $stmt->store_result();
        
        $stmt->bind_result($userid, $username, $email, $user_password, $usertype);
        $stmt->fetch();

        if ($stmt->num_rows == 0)
        {
            
            $stmt->free_result();
            $stmt->close();
            // No results found
            return false;
        }

        $stmt->free_result();
        $stmt->close();
        
        require 'Libs/validation.php';
        // Check password
        $val = new validation();

        $passwordCheckResult = $val->checkPasswordHash($plainTextPass, $user_password);
        
        if($passwordCheckResult)
        {
            // Set session
            $this->setUserSession($userid, $username, $email, $usertype);

            

            return true;
        }
           
        return false;
    }

    // Register
    function register($userDetailsArray)
    {
        
        $result = $this->createUser($userDetailsArray);
        

        return $result;
    }

    function createUser($userDetailsArray)
    {

        require_once 'Libs/validation.php';

        $val = new validation(); // validation class

        // Sort out all values in array so we can check they are valid
        // If some text is not valid we can send it back as invalid


        $userFirstname = $userDetailsArray['firstName'];
        $userSurname = $userDetailsArray['surName'];
        $username = $userDetailsArray['userName'];
        $userDob = $userDetailsArray['userDob'];
        $userEmail = $userDetailsArray['userEmail'];
        $userPass = $userDetailsArray['userPassword'];
        $userPassConfirm = $userDetailsArray['userPassConfirm'];

        $userDetailsCorrect = true; // Variable to determine if we should make user


        $validPassResult = $val->validPassword($userPass);
        $validEmailResult = $val->validEmail($userEmail);
        $validateEmailExists = $val->checkEmailExists($userEmail);

        if($userPass != $userPassConfirm)
        {
            return $failMessage = "Passwords don't match!";
            $userDetailsCorrect = false;
        }

        if($validEmailResult == false)
        {
            return $failMessage = "Email is incorrect!";
            $userDetailsCorrect = false;
        }
        if($validPassResult == false)
        {
            return $failMessage = "Password is not 8 - 20 characters!";
            $userDetailsCorrect = false;
        }
        if($validateEmailExists == false)
        {
            return $failMessage = "An account with this email already exists!" . $userEmail;
            $userDetailsCorrect = false;
        }


        // Only continue if details are correct!
        if($userDetailsCorrect)
        {
            // Set default vars
            $usertype = 1; // User in the role table
            $lastSession = "";
 
            // Get connection string
            $conn = $this->db;

            $user_passwordhash = password_hash( $userPass, PASSWORD_DEFAULT ); // Hash password
            
            // Use prepared statements for security sanatizing input
            $stmt = $conn->prepare(
            "INSERT INTO users (username, firstname, surname, email, dob, userpass, lastsession, usertype) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $stmt->bind_param("sssssssi", $username, $userFirstname, $userSurname, $userEmail, $userDob, $user_passwordhash, $lastSession, $usertype );
            if ($stmt->execute() == false)
            {
                return "Failed:" . $conn->error;
            }
            $last_id = $stmt->insert_id;

            $stmt->close();

            $this->setUserSession($last_id, $username, $userEmail, $usertype);

            return true;
        }
        return false;
    }


    function setUserSession($user_id, $user_name, $user_email, $usertype)
    {



        $_SESSION["loggedin"] = true;
        $_SESSION["uid"] = $user_id;
        $_SESSION["uname"] = $user_name;    
        $_SESSION["uemail"] = $user_email;   
        $_SESSION["utype"] = $usertype;   


        // Update the users lastsession on the users table
        $dateNow = new DateTime();
        $lastSession = $dateNow->format("Y-m-d H:i:s");

 
        // Get connection string
        $conn = $this->db;


        $stmt = $conn->prepare(
        "UPDATE users SET lastsession = ? where userid = ?"
        );
        $stmt->bind_param("si", $lastSession, $user_id);


        if ($stmt->execute() == false)
        {
            return "Failed:" . $conn->error;

        }
        echo "test";

        $stmt->close();


    }
    
    function logout()
    {
        // Set session to an array
        $_SESSION = array();
        
        // Destroy session
        session_destroy();

        // Redirect to index.php
        header("location: index.php");
        exit;
    }


    function getUserBookingsCount()
    {
        // Get how many bookings the user has!
    }

    function getEmployeeDetails($userid)
    {


    }

    function addEmployeeAdmin($userid, $hiredate, $hiredateto, $roleid)
    {

        


        return true;
    }

    function getAllUsers()
    {

        $conn = $this->db;

        $sql = "SELECT * FROM users";
      
        $stmt = $conn->prepare($sql); //prepare statement before execution
        $stmt->execute(); //execute SQL command
        $result = $stmt->get_result(); //initialize variable to hold the data the SQL statement retrieved
        while($r = $result->fetch_assoc())
        {
            $rows[] = $r; //store SQL statement results in an array
        }
        return json_encode($rows); //encode the array in JSON format.
    }
}