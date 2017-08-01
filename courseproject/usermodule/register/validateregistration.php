<!--
FILE:     	validateregistration.php
AUTHOR:   	eric phung
DATE:     	2017.06.28
PURPOSE:  	process user information + validation register
 -->
<?php
session_start();

include '../../classes.php';
include '../../functions.php';


// validate email
function validateEmail($value='email'){
    if (!filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
        //echo("$value is a valid email address\n");
        return true;
    } else {
        //echo "Invalid email format\n";
        return false;
    }// end email check
}


/* function called when submit button tapped */
if(isset($_POST['submit'])) {
    // clear all previous session user vars

    // create new user object
    $userObj = new User();

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
        $userObj->email = $email;

        /* chop and make account name */
        $username = preg_replace('/@.*?$/', '', $email);
        $userObj->username = $username;
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
        $userObj->password =        $password;
    } else {
        // if passwords dont match
    }// end password check


    //first name check
    if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
        $nameErr = "Only letters and white space allowed";
        echo($nameErr);
    } else {
        // issa valid name
        $userObj->firstName =        $firstName;
    }// end first name check

    //last name check
    if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
        $nameErr = "Only letters and white space allowed";
        echo($nameErr);
    } else {
        // issa valid name
        $userObj->lastName =        $lastName;
    }// end last name check



    // save as session user
    $_SESSION['user'] = $userObj;



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





    $duplicateSqlStatement = "SELECT * FROM USER
        WHERE email = '".$_SESSION['user']->getEmail()."';";
    $result = $conn->query($duplicateSqlStatement);

    print "<br>\n";
    if ($result->num_rows > 0) {
        // if duplicate email is found in database, send alert
        header('Location: ../signin');
        $message = "That email address is already in use"."\n"." (Please choose a different one)";
        
    } else {
        // no duplicate was found; save user as record
        $_SESSION['user']->saveMyRecord();
        header('Location: http://corsair.cs.iupui.edu:20291/courseproject/usermodule/signin');
    }
    $conn->close();






    // Unset all of the session variables.
    $_SESSION = array();

    // debug console
    print "<br>\n";
    //print_r($_SESSION);

};// end submit





/* if user entries are submitted correctly redirect user to login page */
//header('Location: http://corsair.cs.iupui.edu:20291/courseproject/usermodule/signin/signin.php');






/* end user input request processing function */
?>

