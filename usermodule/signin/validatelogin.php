<?php
/**
 * filename:	validatelogin.php
 * @authors		eric phung
 * @date    	2017-07-11 22:54:40
 * purpose:		validate login credentials
 */

session_start();


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
    	//create object
    	return true;
    } else {
    	// if username dont match
    	//echo "username doesn't match\n";
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
        //echo "password doesn't match\n";
        return false;
    }// end password check	
}// end password



// on submit button clicked

// test vars
$username = 			'usname';
$password = 			'passlord';

// unwrap values
$username = 			($_POST['username']);
$password = 			($_POST['password']);

// santize values
$username =             test_input($username);
$password =             test_input($password);


// validate then send username
if (isUsername($username,'username') && isPassword($password,'password')) {
	// valid credentials
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
  $_SESSION['title'] = 'Welcome Back, '.$username;
  $_SESSION['message'] = 'you are logged in';
  //echo 'you are logged in';
	//echo $_SESSION['username']."\n";
	//echo $_SESSION['password']."\n";
  //print_r($_SESSION);
	//header("Location:../display/display.php");

} else {
  $_SESSION['title'] = 'Unable to find '.$username;
  $_SESSION['message'] = 'login denied';
  //echo 'login denied';
	//invalid credentials
	//echo $_SESSION['username']."\n";
	//echo $_SESSION['password']."\n";
  //header("Location:../signin/signin.php");
}// end un



?>


<!-- Complete Login Page -->
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>

<?php
//css and javascript
include '../assets.php';
?>
<title>
    Display
</title>
  </head>
  <body>
    <div class='container'>
      <h1>
      <?=$_SESSION['title'];?>
      </h1>
      <h3 id='subtitle'><?=$_SESSION['message']?></h3>
      <label id='labelinfo'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</label>

<!--      <div class='container'>
        <table class="table table-bordered table-responsive">
          <thead>
            <tr>
              <th>ID Number</th>
              <th>Name</th>
              <th>Image</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div> -->
    </div>
  </body>
</html>


