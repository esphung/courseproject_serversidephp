<?php
/**
 * filename 	userclass.php
 * @authors		eric phung (esphung@gmail.com)
 * @date 		2017-07-09 21:54:08
 * @purpose		user class blueprint
 */

/*
 /$$   /$$  /$$$$$$  /$$$$$$$$ /$$$$$$$
| $$  | $$ /$$__  $$| $$_____/| $$__  $$
| $$  | $$| $$  \__/| $$      | $$  \ $$
| $$  | $$|  $$$$$$ | $$$$$   | $$$$$$$/
| $$  | $$ \____  $$| $$__/   | $$__  $$
| $$  | $$ /$$  \ $$| $$      | $$  \ $$
|  $$$$$$/|  $$$$$$/| $$$$$$$$| $$  | $$
 \______/  \______/ |________/|__/  |__/

*/

class User {

	// user properties
	var $id_num;
	var $firstName;
	var $lastName;
	var $username;
	var $email;
	var $password;


	/* setters and getters */

	/* first name */
	function setFirstName($value){
		# code...
		$this->firstName = $value;
	}// end set first

	function getFirstName(){
		# code...
		return $this->firstName;
	}// end get first

	/* last name */
	function setLastName($value){
		# change current value of display name (first + last, username)
		$this->lastName = $value;
		
	}// end set last
	function getLastName(){
		# code...
		return $this->lastName;
	}// end get last

	/* username */
	function setUsername($value){
		# code...
		$this->username = $value;
	}// end set username
	function getUsername(){
		# code...
		return $this->username;
	}// end get username

	/* email */
	function setEmail($value){
		# code...
		$this->email = $value;
	}// end set email
	function getEmail(){
		# code...
		return $this->email;
	}// end get email

	/* password */
	function setPassword($value){
		# code...
		$this->password = $value;
	}// end set password
	function getPassword(){
		# code...
		return $this->password;
	}// end get password




	public function __construct(){
		# code...overloaded constructor
	}


	public function __destruct(){
	}//destructor

	function getMyRecord($email){
		//check if user exists alread in database
		// database vars
	    $servername = "localhost";
	    $username = "esphung";
	    $password = "esphung";
	    $dbname = "esphung_db";

	$con=mysqli_connect($servername,$username,$password,$dbname);
	// Check connection
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }

	$sql="SELECT * FROM USER WHERE email = '".$email."';";

	if ($result=mysqli_query($con,$sql))
	  {
	  // Fetch one and one row
	  while ($row=mysqli_fetch_row($result)){
	  	// set each field value as appropriate user property
	  	// id, first, last, un, email, password, login 
	    $this->id_num = $row[0];
	    $this->firstName = $row[1];
	    $this->lastName = $row[2];
	    $this->username = $row[3];
	    $this->email = $row[4];
	    $this->setPassword($row[5]);
	    }
	    //printf ("%s (%s)\n",$row[0],$row[1]);
	  // Free result set
	  mysqli_free_result($result);
	}

	mysqli_close($con);
			
	}// end get user record

	public function isUser($email){
		//check if user exists alread in database
		// database vars
	    $servername = "localhost";
	    $username = "esphung";
	    $password = "esphung";
	    $dbname = "esphung_db";

		// Create connection
	    $conn = new mysqli($servername, $username, $password, $dbname);
	    // Check connection
	    if ($conn->connect_error) {
	        die("Connection failed: " . $conn->connect_error);
	    }// end connection test

	    // statement to send to db
	    $duplicateSqlStatement = "SELECT * FROM USER
        WHERE email = '".$email."';";
        $result = $conn->query($duplicateSqlStatement);

        if ($result->num_rows > 0) {
        	// user profile found
        	return true;
        }
        else {
        // no user profile was found
    }
    $conn->close();
    return false;

	}// end isUser?

	public function isMyPassword($value){
		// password string comparing
	    if (strcmp($value, $this->password) == 0) {
	        // passwords matches
	        return true;
	    } else {
	        // if passwords dont match
	        //echo "password doesn't match\n";
	        return false;
	    }// end password check	
		
	}// end isMyPassword?

	public function saveMyRecord(){
		/* saves user to database */
		// global vars
		$servername = "localhost";
		$username = "esphung";
		$password = "esphung";
		$dbname = "esphung_db";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}// end connection test

	    // save user entry to database
	    $sql = "INSERT INTO USER (first_name,last_name,username,email,password)
	    VALUES (
	    '".$this->firstName."',
	    '".$this->lastName."',
	    '".$this->username."',
	    '".$this->email."',
	    '".$this->password."'); ";

	    if ($conn->query($sql) === TRUE) {
	        echo "User record created successfully\n<br>";
	        return true;
	    } else {
	        echo "Error: " . $sql . "<br>" . $conn->error;

	    }
	    return false;

	    // close connection
	    $conn->close();
		
	}// end save user record


}// end user class def




/*.test case */
/*
// create an object
$userObject = new User();

// set object properties
$userObject->setFirstName("foo");
$userObject->setLastName("bar");
$userObject->setUsername("foobar1234");
$userObject->setEmail("bar2foo@yahoo.com");
$userObject->setPassword("escofoobar1!");
*/
/*
// show object properties
print "First Name:\t\t".	$userObject->getFirstName().	"\n";
print "Last Name:\t\t". 	$userObject->getLastName().		"\n";
print "Username:\t\t". 	$userObject->getUsername().			"\n";
print "Email:\t\t\t". 	$userObject->getEmail().			"\n";
print "Password:\t\t". 	$userObject->getPassword().			"\n";

*/
// make JSON !!!
//$myJSON = json_encode($userObject);





