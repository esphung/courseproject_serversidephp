<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>

<?php
//css and javascript locations
include '../assets.php';
?>

<title>
		Register
</title>
	</head>
	<body id="body">
		<div class='container'><h1>Register</h1>
	       <h3 id='subtitle'>New User Application</h3>
			<label id='labelinfo'>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</label>

        <div class='container'>

            <form id='form' data-toggle="validator" method="POST" action="validateregistration.php">
                <!-- FIRST NAME -->
                <div class="form-group">
                    <label for="inputFirstName" class="control-label">First Name</label>
                    <input type="text" class="autoinput form-control" id="inputFirstName" placeholder="Harray" name="inputFirstName" required>
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
            </div>
            </div>

    </body>
</html>

		