<?php

require_once 'dbContext.php';

class role
{

    // User class that holds all functions relative to user
    // Also extends the role class as we might need to do calls to methods to find out information about users role.

    private $db;
    private $roleid;

    function __construct()
    {
        $sqlConn = new dbContext();

        $this->db = $sqlConn->getConnstring();
    }

    function getAllRoles()
    {
        $conn = $this->db;

        $sql = "SELECT * FROM user_role";
        $stmt = $conn->prepare($sql); //prepare statement before execution
        $stmt->execute(); //execute SQL command
        $result = $stmt->get_result(); //initialize variable to hold the data the SQL statement retrieved
        while($r = $result->fetch_assoc())
        {
            $rows[] = $r; //store SQL statement results in an array
        }
        return json_encode($rows); //encode the array in JSON format.
    }

    function addEmployee()
    {
        $conn = $this->db;


        if($userid == null)
        {
            return false;
        }

        // Use prepared statements for security sanatizing input
        $stmt = $conn->prepare(
        "INSERT INTO employee (hire_date, hired_to_date, roleid, userid) 
        VALUES (?, ?, ?, ?)"
        );
        $stmt->bind_param("ssii", $hiredate, $hiredateto, $roleid, $userid );
        if ($stmt->execute() == false)
        {
            return "Failed:" . $conn->error;
        }
    }
}