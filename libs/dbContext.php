<?php
#PhpMyAdmin
Class dbContext{
    /* 
    This is the database connection class
    The reason for this is instead of creating multiple
    dbContext objects and having to pass in the arguments i can just create a class
    which will do it for me everytime i reference it!
    */
	private $servername = "comp-server.uhi.ac.uk";
	private $username = "pe15008146";
	private $password = "camerondesmond";
	private $dbname = "pe15008146";
    
	public function getConnstring() 
	{
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname) or die("Connection Failed: " . mysqli_connect_error());
		/* check connection */
		if (mysqli_connect_errno()) {
			printf("Connection Failed: %s\n", mysqli_connect_error());
			exit();
		} 
		return $conn;
	}
} 
?>