<?php

//$baseurl='/~homeuser';
//$baseurl='/courseproject';


// make new page objects
include 'pageclass.php';


// home page
$pagename = 'home';
$subtitle = 'pill finder application';
$homepage = new Page('home','pill finder application','');


// register page
$registerpagename = 'register';
$registerpagesubtitle = 'new user application';

$registerpagehtml = <<<'EOT'
    <!-- bootsrap validator -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>
    <form data-toggle="validator" method="POST" action="validateregistration.php">
        <!-- FIRST NAME -->
        <div class="form-group">
            <label for="inputFirstName" class="control-label">First Name</label>
            <input type="text" class="form-control" id="inputFirstName" placeholder="Harray" name="inputFirstName" required>
        </div>
        <!-- LAST NAME -->
        <div class="form-group">
            <label for="inputLastName" class="control-label">Last Name</label>
            <input type="text" class="form-control" id="inputLastName" placeholder="Carey" name="inputLastName" required>
        </div>
        <!-- EMAIL FIELD -->
        <div class="form-group">
            <label for="inputEmail" class="control-label">Email Address</label>
            <input id="inputEmail" type="email" class="form-control" placeholder="Email" data-error="Bruh, that email address is invalid" name="inputEmail" required>
            <div class="help-block with-errors"></div>
        </div>
        <!-- CONFIRM EMAIL -->
        <div class="form-group">
            <label for="inputConfirmEmail" class="control-label">Confirm Email</label>
            <input id="inputConfirmEmail" type="email" class="form-control" placeholder="Confirm Email" data-error="Bruh, that email address is invalid" data-match="#inputEmail" data-match-error="Whoops, these don't match" name="inputConfirmEmail" required>
            <div class="help-block with-errors"></div>
        </div>
        <!-- PASSWORD STUFF -->
        <div class="form-group">
            <label for="inputPassword" class="control-label">Password</label>
            <input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" name="inputPassword" required>
            <!-- password confirm -->
            <label for="inputConfirmPassword" class="control-label">Confirm Password</label>
            <input type="password" class="form-control" id="inputConfirmPassword" data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" name="inputConfirmPassword" required>
            <div class="help-block with-errors"></div>
        </div>
        <!-- required checkbox -->
        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" id="terms" data-error="Before you wreck yourself" required> Check yourself
                </label>
                <div class="help-block with-errors"></div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </div>
    </form>


EOT;

$page = new Page($registerpagename, $registerpagesubtitle, $registerpagehtml);



// search page
$pagename = 'search';
$subtitle = 'search for a pill';
$searchpage = new Page($pagename, $subtitle,'');

// display/results page

$pagename = 'display';
$subtitle = 'your profile results';

$displaypagehtml = <<<'EOT'

  <table class="table table-bordered table-responsive">
    <thead>
      <tr>
        <th>ID Number</th>
        <th>Name</th>
        <!-- <th>Labeler</th> -->
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
    </tbody>
  </table>

EOT;
$displaypage = new Page($pagename, $subtitle,$displaypagehtml);

// sign in page
$pagename = 'signin';
$subtitle = 'welcome back';

$signinpagehtml = <<<'EOT'
<form class="form-signin" method='post' action='validatelogin.php'>
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" class="form-control" placeholder="Username" name='username' required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name='password' required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name='submit'>Sign In</button>
        </form>
EOT;

$signinpage = new Page($pagename, $subtitle, $signinpagehtml);



// redirect to login
//header("Location: ".$baseurl."/home");
//die();


?>

<!-- 

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>

<?php
//css and javascript
include 'assets.php';
?>

<title><?=ucwords($pagename)?></title>

</head>
<body>
<div class='container'><h1><?=ucwords($pagename)?></h1>
	<div class='menu'>
	    <?php include 'menu.php';?>
	</div>
	<h3 id='subtitle'><?=ucwords($subtitle)?></h3>
	<label id='labelinfo'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</label></div>

</body>
</html>


 -->