<?php
class validation
{

    function checkPasswordHash($password, $password_hashed)
    {
        // Make sure password and email isn't null otherwise return failed
        if($password != null)
        {

            $passwordVerifyResult = password_verify( $password, $password_hashed);

            if($passwordVerifyResult)
            {
                return true;
            }
            return false;

        }
        return false;
    }

    function validPassword($password)
    {
        // Password must be atleast 8 - 20 chars
        if (strlen($password) <= 8) {
            return false;
        }
        return true;
    }

    function validEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            return false;
        }
        return true;
    }


    function checkEmailExists($email)
    {
        // Check to see if the passwords match
        require_once 'dbContext.php';

        $db1 = new dbContext();

        // Get connection string
        $conn = $db1->getConnstring();

        // Use prepared statements for security sanatizing input
        $stmt = $conn->prepare("SELECT * FROM users where email = ?");
        $stmt->bind_param("s", $email );
        $stmt->execute();

        $stmt->store_result();

        if($stmt->num_rows > 0)
        {

            /* free results */
            $stmt->free_result();

            /* close statement */
            $stmt->close();

            return false;
        }

        return true;
    }


}
?>