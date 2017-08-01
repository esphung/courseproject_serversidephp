<?php
//include('../login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: ../display");
}
?>
<!-- 
 $$$$$$\  $$$$$$\  $$$$$$\  $$\   $$\ $$$$$$\ $$\   $$\
$$  __$$\ \_$$  _|$$  __$$\ $$$\  $$ |\_$$  _|$$$\  $$ |
$$ /  \__|  $$ |  $$ /  \__|$$$$\ $$ |  $$ |  $$$$\ $$ |
\$$$$$$\    $$ |  $$ |$$$$\ $$ $$\$$ |  $$ |  $$ $$\$$ |
 \____$$\   $$ |  $$ |\_$$ |$$ \$$$$ |  $$ |  $$ \$$$$ |
$$\   $$ |  $$ |  $$ |  $$ |$$ |\$$$ |  $$ |  $$ |\$$$ |
\$$$$$$  |$$$$$$\ \$$$$$$  |$$ | \$$ |$$$$$$\ $$ | \$$ |
 \______/ \______| \______/ \__|  \__|\______|\__|  \__|
filename:		signin.php
purpose:		login form
author:			eric phung
date:			2017.07.27
 -->
<?php
include '../../htmlTopPage.html';
?>
<title>
Login | Pill Identi🔥
</title>


<!-- styles -->
<?php
//include '../assets.php';
?>

<style type="text/css">

div.transbox {
  padding-top: 2cm;
 
  background-color: #ffffff;
  border: 1px solid black;
  opacity: 0.9;
  filter: alpha(opacity=60);
}

div.transbox p {
    padding-top: 2cm;
    margin: 5%;
    font-weight: bold;
    color: #000000;
}


</style>



</head>
<body id="body">

<!-- body div -->
<div class='container'>
<!-- jumbotron div -->
<!-- <div class="jumbotron transbox" > -->

<div>
<!-- <h1>Pill Identi🔥</h1> -->
<h2 id='subtitle'>Login Page</h2>
	<label id='labelinfo'>Pill Identi🔥 is an application for identifying unknown pills developed for law enforcement health services by Eric Phung.</label>
</div>


<!-- </div> -->

<form class="form-signin" method='post' action='../../login.php'>
<label for="email" class="sr-only">email</label><br>
<input type="email" id="email" class="autoinput form-control" placeholder="Email" name='email' required autofocus>
<label for="inputPassword" class="sr-only">password</label><br>
<input type="password" id="inputPassword" class="form-control" placeholder="Password" name='password' required><br>
<!-- <a class="btn btn-primary" href="login.php" role="button">Sign In</a> -->
<button class="btn btn-primary myBtn" type="submit" name='submit'>Submit</button>
<br>

<!-- <input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Sign In"> -->
</form>

<div>
<a id="mylink" href="../register" title="register">Register Here</a>


</div>
</div>




</body>

</html>