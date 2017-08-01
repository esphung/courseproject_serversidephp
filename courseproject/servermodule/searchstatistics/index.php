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

<title>Statistics | Pill Identi🔥</title>

</head>

<?php
// database vars
$servername = "localhost";
$username = "esphung";
$password = "esphung";
$dbname = "esphung_db";


// init vars
$propertyList = array("Reference Number","User ID","Pill ID","Pill Name");
//$data = array("020202","fbar","foo","bar","fbar@gmail.com","hellopassword");
$data = array();
$dataArray = array();


$con=mysqli_connect($servername,$username,$password,$dbname);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * FROM SEARCHED;";

if ($result=mysqli_query($con,$sql)){
  while ($row=mysqli_fetch_row($result)){
 
  	$data = $row;
    array_push($dataArray, $data);
    }
    //printf ("%s (%s)\n",$row[0],$row[1]);



  // Free result set
  mysqli_free_result($result);

/*  // debug new array
  if ($dataArray != NULL) {
  	var_dump($dataArray);
  }// debug dump*/
  

}

mysqli_close($con);
//var_dump($userObjectList[0]->firstName);
?><body id='body'>



<div class="container">
	<h2>Search Statistics</h2>


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
  for ($i = 0; $i < count($dataArray); $i++) {
    print "<tr>"."\n";

    print "<td>";
    print_r($dataArray[$i][0]);
    print "</td>"."\n";

    print "<td>";
    print_r($dataArray[$i][1]);
    print "</td>"."\n";

    print "<td>";
    print_r($dataArray[$i][2]);
    print "</td>"."\n";


    print "<td>";
    print_r($dataArray[$i][3]);
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