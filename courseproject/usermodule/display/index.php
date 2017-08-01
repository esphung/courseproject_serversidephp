<?php
session_start();

// included files
include '../../functions.php';
include '../../classes.php';


if (isset($_SESSION['login_user'])) {
	if ($_SESSION['isAdmin'] == true) {
		//echo "Admin Logged In!";
		//$_SESSION['isAdmin'] = true;
		// redirect to admin page
		header("Location: ../../servermodule/admin");
	} else {
	//echo "you are logged in\n<br>";
	//echo $_SESSION['login_user'];


		$user = new User();
		$user->getMyRecord($_SESSION['login_user']);

	}



} else {
// redirect to login page
header("Location: ../signin");
}

?>

<?php
include '../../htmlTopPage.html';
?>

<?php
//css and javascript
include '../assets.php';
?>
<title>
Profile Page | Pill Identi🔥
</title>
</head>
<body>


<div class='container'>
<!-- <div class="jumbotron"> -->
<h1>Profile Page</h1>     

<h2 id='subtitle'>Welcome, <?= $user->getFirstName()." ".$user->getLastName()?></h2>
<label id='labelinfo'>Here, you can search for a pill, view your account information or logout.</label><br>

<?php
include '../menu.php';
?>

<!-- </div> -->


</div>


<?php
include '../../htmlBottomPage.html';
?>

<!-- </body>
</html> -->
