<?php
/**
 * filename:	validatelogin.php
 * @authors		eric phung
 * @date    	2017-07-11 22:54:40
 * purpose:		validate login credentials
 */
//session_start();

// sanitize values
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
} // end test_input() function def


function isUsername($value,$correct){
	// check un exists
    if (strcmp($value,$correct) == 0) {
    	// username matches correctly
    	return true;
    } else {
    	// if username dont match
    	echo "username doesn't match\n";
    	return false;
    }// end email string matching validation
}// end username

function isPassword($value,$correct){
	// check pw exists
    // password string comparing
    if (strcmp($value, $correct) == 0) {
        // passwords matches
        return true;
    } else {
        // if passwords dont match
        echo "password doesn't match\n";
        return false;
    }// end password check	
}// end password



if(isset($_POST['submit'])) {
	// on submit button clicked

	// test vars
	$username = 'usname';
	$password = 'passlord';

	// unwrap values
	$username =                    ($_POST['username']);
	$password =                    ($_POST['password']);
	
	// santize values
	$username =             test_input($username);
	$password =             test_input($password);

	// validate username
	if (isUsername($username,'username')) {
		echo "username matches!\n";
	}// end un

	// validate password
	if (isPassword($password,'password')) {
		echo "password matches!\n";
	}// end pw


	//print "Submitted!\n";

};// end submit button





?>
