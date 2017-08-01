<!-- 
$$\   $$\  $$$$$$\  $$$$$$$$\ $$$$$$$\   $$$$$$\
$$ |  $$ |$$  __$$\ $$  _____|$$  __$$\ $$  __$$\
$$ |  $$ |$$ /  \__|$$ |      $$ |  $$ |$$ /  \__|
$$ |  $$ |\$$$$$$\  $$$$$\    $$$$$$$  |\$$$$$$\
$$ |  $$ | \____$$\ $$  __|   $$  __$$<  \____$$\
$$ |  $$ |$$\   $$ |$$ |      $$ |  $$ |$$\   $$ |
\$$$$$$  |\$$$$$$  |$$$$$$$$\ $$ |  $$ |\$$$$$$  |
 \______/  \______/ \________|\__|  \__| \______/
filename:		index.php
author:			eric phung
purpose:		page to show dynamic table content to admin about users
 -->
<?php
session_start();
// included files
include '../../functions.php';
include '../../classes.php';
if (isset($_SESSION['login_user']) && $_SESSION['isAdmin'] == true) {
	// user is an admin
	// create user object
	$user = new User();
	$user->getMyRecord($_SESSION['login_user']);

} else {
	// leave
	header("Location: ../../usermodule/signin");
}
?>
<?php
include '../../htmlTopPage.html';
?>



<title>Users | Pill Identi🔥</title>
</head>
<body id='body'>
<div class="container">
<h2>Users</h2>

<?php
// init vars
$propertyList = array("ID","Username","First","Last","Email","Password");
//$data = array("020202","fbar","foo","bar","fbar@gmail.com","hellopassword");
$data = array();
$dataArray = array();
//array_push($dataArray, $data);
$userObjectList = array();

?>

<?php
// database vars
$servername = "localhost";
$username = "esphung";
$password = "esphung";
$dbname = "esphung_db";


$con=mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM USER;";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  	//$user = new User();
  while ($row=mysqli_fetch_row($result)){
  	
  	// set each field value as appropriate user property
  	// id, first, last, un, email, password, login
  	$data = $row;
    array_push($dataArray, $data);
    }
    //printf ("%s (%s)\n",$row[0],$row[1]);
  
  
  for ($i = 0; $i < count($dataArray); $i++) {
  	$user = new User();
  	$user->id_num= $dataArray[$i][0];
  	$user->firstName = $dataArray[$i][1];
  	$user->lastName = $dataArray[$i][2];
  	$user->username = $dataArray[$i][3];
  	$user->email = $dataArray[$i][4];
  	$user->password = $dataArray[$i][5];
  	array_push($userObjectList, $user);
  }
  // Free result set
  mysqli_free_result($result);

}

mysqli_close($con);
//var_dump($userObjectList[0]->firstName);
?>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
<?php
		// loop thru for table headers
		for ($i = 0; $i < count($propertyList); $i++) {
			print "\t\t\t"."<th>".$propertyList[$i];

			print "</th>"."\n";
		}
?>
</tr>
</thead>
<tbody>

<?php
	for ($i = 0; $i < count($userObjectList); $i++) {
		print "<tr>"."\n";

		print "<td>";
		print_r($userObjectList[$i]->id_num);
		print "</td>"."\n";

		print "<td>";
		print_r($userObjectList[$i]->getUsername());
		print "</td>"."\n";

		print "<td>";
		print_r($userObjectList[$i]->getFirstName());
		print "</td>"."\n";

		print "<td>";
		print_r($userObjectList[$i]->getLastName());
		print "</td>"."\n";

		print "<td>";
		print_r($userObjectList[$i]->getEmail());
		print "</td>"."\n";

		print "<td>";
		print_r($userObjectList[$i]->getPassword());
		print "</td>"."\n";
			
			
			
		}// end for h

		print "</tr>"."\n";
		
?>
		

	</tbody>
</table>

	
</div>






<?php
include '../../htmlBottomPage.html';
?>