<?php
include '../../htmlTopPage.html';
?>
<title>Admin Login</title>

<?php
//include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: ../display");
}
?>



<!-- body div -->
<div class='container'>
<!-- jumbotron div -->

<h1>Admin Login</h1>


<form class="form-signin" method='post' action='validate_admin_login.php'>
<label for="email" class="sr-only">email</label><br>
<input type="email" id="email" class="autoinput form-control" placeholder="Email" name='email' required autofocus>
<label for="inputPassword" class="sr-only">password</label><br>
<input type="password" id="inputPassword" class="form-control" placeholder="Password" name='password' required><br>
<!-- <a class="btn btn-primary" href="login.php" role="button">Sign In</a> -->
<button class="btn btn-primary myBtn" type="submit" name='submit'>Sign In</button>
<br>

<!-- <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign In"> -->
</form>

</div>






<?php
include '../../htmlBottomPage.html';
?>