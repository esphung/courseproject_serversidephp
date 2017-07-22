<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>

<?php
//css and javascript
include '../assets.php';
?>
<title>
		Sign In
</title>
	</head>
	<body>
		<div class='container'><h1>Signin</h1>
	<h3 id='subtitle'>Welcome Back</h3>
			
	<label id='labelinfo'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</label>

<div class='container'>
	<form class="form-signin" method='post' action='validatelogin.php'>
            <label for="username" class="sr-only">Username</label>
            <input type="text" id="username" class="autoinput form-control" placeholder="Username" name='username' required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name='password' required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name='submit'>Sign In</button>
        </form></div></div>
        </body>
</html>

		