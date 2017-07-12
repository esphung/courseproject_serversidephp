<!--
FILE:     	validateregistration.php
AUTHOR:   	eric phung
DATE:     	2017.06.28
PURPOSE:  	process user information + validation register
 -->
<?php

// initialize empty vars
$email = "";
$confirmEmail = "";
$username = "";
$password = "";
$confirmPassword = "";
$firstName =            "";
$lastName =             "";


// sanitize values
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
} // end test_input() function def

// validate email
function validateEmail($value='email'){
    if (!filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
        echo("$value is a valid email address\n");
        return true;
    } else {
        echo "Invalid email format\n";
        return false;
    }// end email check
}

    // test vars
    /*$email = "hello@gmail.com";
    $confirmEmail = "hello@gmail.com";
    $password = "12345";
    $confirmPassword = "12345";
    $firstName =            'niff';
    $lastName =             'tons';
    */




/* function called when submit button tapped */
if(isset($_POST['submit'])) {
/* store user input as variables */

    $firstName =                ($_POST['inputFirstName']);
    $lastName =                 ($_POST['inputLastName']);
    $email =                    ($_POST['inputEmail']);
    $confirmEmail =             ($_POST['inputConfirmEmail']);
    $password =                 ($_POST['inputPassword']);
    $confirmPassword =          ($_POST['inputConfirmPassword']);


    /* sanitize raw user input values */
    $firstName =            test_input($firstName);
    $lastName =             test_input($lastName);
    $email =                test_input($email);
    $confirmEmail =         test_input($confirmEmail);
    $password =             test_input($password);
    $confirmPassword =      test_input($confirmPassword);   

    /*correct first letter of names*/
    $firstName =            ucwords($firstName);
    $lastName =             ucwords($lastName);




    // Remove all illegal characters from email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate e-mails
    validateEmail($email);
    validateEmail($confirmEmail);


    /* check for matching email values */
    // email string comparing
    if (strcmp($email, $confirmEmail) == 0) {
        // if emails matched..save email in session
        $_SESSION['email'] = $email;

        /* chop and make account name */
        $username = preg_replace('/@.*?$/', '', $email);
        $_SESSION['username'] = $username;
    } else {
        // if emails dont match
        //echo $email."\n";
        echo "emails don't match\n";
        //echo $confirmEmail."\n";
        return;


    }// end email string matching validation


    // password string comparing
    if (strcmp($password, $confirmPassword) == 0) {
        # only valid matched password...
        $_SESSION["password"] =        $password;
        //echo $_SESSION['password'];
    } else {
        // if passwords dont match
        //echo $password."\n";
        echo "passwords don't match\n";
        //echo $confirmPassword."\n";
    }// end password check


    //first name check
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
        $nameErr = "Only letters and white space allowed";
        echo($nameErr);
        //echo $firstName;
    } else {
        //echo $firstName;
        $_SESSION["firstName"] =        $firstName;
        //echo($_SESSION["firstName"]."\n");
        // issa valid name
    }// end first name check

    //last name check
    if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
        $nameErr = "Only letters and white space allowed";
        echo($nameErr);
        //echo $lastName;
    } else {
        //echo $lastName;
        $_SESSION["lastName"] =        $lastName;
        //echo ($_SESSION["lastName"]."\n");
        // issa valid name
    }// end last name check




};// end submit


// ==================================================
// going into another file later


// custom class
include "userclass.php";

// create user object
$userObj = new User();

// set user object properties
$userObj->setFirstName($_SESSION["firstName"]);
$userObj->setlastName($_SESSION["lastName"]);
$userObj->setUsername($_SESSION["username"]);
$userObj->setEmail($_SESSION["email"]);
$userObj->setPassword($_SESSION["password"]);

// save as session user
$_SESSION['user'] = $userObj;


// make user object into json string
$myJSON = json_encode($userObj);
echo($myJSON);

/* end user input request processing function */
?>
