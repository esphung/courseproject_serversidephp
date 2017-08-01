<?php
// start login session
session_start();



// stored error message
$error = "";


// included files
include 'functions.php';
include 'classes.php';

if (isset($_POST['submit'])) {
if (empty($_POST['email']) || empty($_POST['password'])) {
//echo "empty email";
$error = "Email or password is invalid";

} else {

// define email and password are set
$email = 				$_POST['email'];
$password = 			$_POST['password'];

// sanitize input
$email =                test_input($email);
$password =             test_input($password);


// create empty user object
$userObj = new User();



// check database with user method
if ($userObj->isUser($email) == true) {
	// if user is registered
	// get user record
  	$userObj->getMyRecord($email);
	// if password is correct
	if ($userObj->isMyPassword($password) == true) {
		// log user into session
		//$_SESSION['login_user']=$userObj->getEmail();
		$_SESSION['login_user']=$email;
		//$_SESSION['email']=$email;
		//print_r($_SESSION);

		// check for admin privileges
		if (($_SESSION['login_user'] == "esphung@gmail.com") == true) {
			// user is an admin
			$_SESSION['isAdmin'] = true;

		} else {
			// user is not admin
			$_SESSION['isAdmin'] = false;
		}

		// redirect to profile page
		header("Location: usermodule/display");
	} else {
		// invalid password
		
		// redirect to login page
		header("Location: usermodule/signin");
		// echo '<script language="javascript">';
		// echo 'alert("Invalid Password")';
		// echo '</script>';
	}
	

  	
	
} else {
	// invalid credentials
	unset($_SESSION['login_user']);


	// redirect to login page
	header("Location: usermodule/signin");


}// end else

/*mysql_close($connection);

*/

}// end un and pw set


}// end if submit


?>