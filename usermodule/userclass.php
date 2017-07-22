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
	var $firstName;
	var $lastName;
	var $username;
	var $email;
	var $password;

	/* setters and getters */

	/* first name */
	function setFirstName($value='arg'){
		# code...
		$this->firstName = $value;
	}// end set first

	function getFirstName(){
		# code...
		return $this->firstName;
	}// end get first

	/* last name */
	function setLastName($value="arg"){
		# change current value of display name (first + last, username)
		$this->lastName = $value;
		
	}// end set last
	function getLastName(){
		# code...
		return $this->lastName;
	}// end get last

	/* username */
	function setUsername($value='arg'){
		# code...
		$this->username = $value;
	}// end set username
	function getUsername(){
		# code...
		return $this->username;
	}// end get username

	/* email */
	function setEmail($value='arg'){
		# code...
		$this->email = $value;
	}// end set email
	function getEmail(){
		# code...
		return $this->email;
	}// end get email

	/* password */
	function setPassword($value='arg'){
		# code...
		$this->password = $value;
	}// end set password
	function getPassword(){
		# code...
		return $this->password;
	}// end get password



	public function __construct($value='arg'){
		# code...null constructor
	}

	public function __destruct(){
	}//destructor


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





