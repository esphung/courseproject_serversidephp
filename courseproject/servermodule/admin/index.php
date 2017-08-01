<!-- 
 $$$$$$\  $$$$$$$\  $$\      $$\ $$$$$$\ $$\   $$\
$$  __$$\ $$  __$$\ $$$\    $$$ |\_$$  _|$$$\  $$ |
$$ /  $$ |$$ |  $$ |$$$$\  $$$$ |  $$ |  $$$$\ $$ |
$$$$$$$$ |$$ |  $$ |$$\$$\$$ $$ |  $$ |  $$ $$\$$ |
$$  __$$ |$$ |  $$ |$$ \$$$  $$ |  $$ |  $$ \$$$$ |
$$ |  $$ |$$ |  $$ |$$ |\$  /$$ |  $$ |  $$ |\$$$ |
$$ |  $$ |$$$$$$$  |$$ | \_/ $$ |$$$$$$\ $$ | \$$ |
\__|  \__|\_______/ \__|     \__|\______|\__|  \__|

filename:		index.php
author:			eric phung
purpose:		home page for admin users
 -->
<?php
session_start();
// included files
include '../../functions.php';
include '../../classes.php';


if (isset($_SESSION['login_user']) && $_SESSION['isAdmin'] == true) {
	//$_SESSION['isAdmin'] = true;

	// create user object
	$user = new User();
	$user->getMyRecord($_SESSION['login_user']);



} else {
	// redirect to login page
	header("Location: ../../");// courseproject
}

include '../../htmlTopPage.html';
?>


<title>
Admin | Pill Identi🔥
</title>
</head>
<body id="body">
<!-- start body -->

<div class='container'>
	

<!-- debug -->
<h2>Admin Page</h2>
<p>Your are logged in as admin: <?=$_SESSION['login_user']?></p>

<ul class="list-group">
	<li class="list-group-item"><a href="../users" title="users">Users</a></li>
	<li class="list-group-item"><a href="../searchstatistics" title="search_statistics">Search Statistics</a></li>
	<li class="list-group-item"><a href="../../logout.php" title="logout">Logout</a></li>
</ul>

</div>


<!-- end body -->

<?php

include '../../htmlBottomPage.html';


?>