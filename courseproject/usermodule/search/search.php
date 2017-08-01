<!--
FILE:     search.php
AUTHOR:   eric phung
DATE:     2017.06.28
PURPOSE:    search for a pill
 -->
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



<title>Search | Pill Identi🔥</title>
</head>
<body id='body'>
<div class='container'>
<h2 id='title'>Search Results</h2>

<?php
/* function called when submit button tapped */
if(isset($_POST['submit'])) {

	/* store user input as variables */
	$imprint =      ($_POST['imprint']);
	$color =        ($_POST['color']);
	$shape =        ($_POST['shape']);


	/* sanitize input */
	$imprint =     test_input($imprint);
	$color =       test_input($color);
	$shape =       test_input($shape);

  /*.the NLM api only deals with all capital letters for color and shape */
  $color =       strtoupper($color);
  $shape =       strtoupper($shape);

  // save user's seearch criteria
  $_SESSION["imprint"] =      $imprint;
  $_SESSION["color"] =        $color;
  $_SESSION["shape"] =        $shape;

/*  //create search object
  $myObj->imprint = $_SESSION["imprint"];
  $myObj->color = $_SESSION["color"];
  $myObj->shape = $_SESSION["shape"];
*/
  //$_SESSION["search"] = $myObj;

  //print_r($_SESSION);


  // search input into json string
  //$myJSON = json_encode($userSearchObj);
  //echo($myJSON);


  $url = "https://rximage.nlm.nih.gov/api/rximage/1/rxnav?&resolution=600&color=".$_SESSION["color"]."&shape=".$_SESSION["shape"]."&imprint=".$_SESSION["imprint"]."";

  $ch = curl_init($url);
  $fp = fopen("search_results.json", "w");

  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);

  curl_exec($ch);
  curl_close($ch);
  fclose($fp);

  $data = json_decode(file_get_contents("search_results.json"), true);
  //print_r($data);

  //print_r($data['nlmRxImages']);
  //print_r($data['nlmRxImages'][0]);
  //print_r($data['nlmRxImages'][0]['name']);

  // initialize empty pill array
  $pillArray = array();

  

  

  for ($i = 0; $i < count($data['nlmRxImages']); $i++) {
    // initialize empty pill object
    $pillObj = new Pill();
    $pillObj->pill_id =     ($data['nlmRxImages'][$i]['id']);
    $pillObj->name =        ($data['nlmRxImages'][$i]['name']);
    $pillObj->labeler =     ($data['nlmRxImages'][$i]['labeler']);
    $pillObj->imageUrl =    ($data['nlmRxImages'][$i]['imageUrl']);
    array_push($pillArray, $pillObj);
  }// end for loop

  //print_r($pillArray);

  $_SESSION['search'] = $pillArray;
  //print_r($_SESSION['search']);

/*  for ($i = 0; $i < count($data['nlmRxImages']); $i++) {
    print "<br>";
    print_r($data['nlmRxImages'][$i]['id']);
    print "<br>";
    print_r($data['nlmRxImages'][$i]['name']);
    print "<br>";
    print_r($data['nlmRxImages'][$i]['labeler']);
    print "<br>";
    print_r($data['nlmRxImages'][$i]['imageUrl']);
    print "<br>";
    print "========================================";
  }// end for loop*/







print "<table class='table table-bordered'>";
print "<thead>";
print "<tr>";

print "<th>"."Image"."</th>";
// print "<th>"."Pill ID"."</th>";
print "<th>"."Name"."</th>";
// print "<th>"."Manufacturer"."</th>";


print "</tr>";
print "</thead>";

print "<tbody>";


// iterate thru pill results for table displays
for ($i = 0; $i < count($_SESSION['search']); $i++) {
  print "<tr>";
  print "<td><img class='img-thumbnail' src='".$_SESSION['search'][$i]->imageUrl."' alt='".$_SESSION['search'][$i]->name."'></td>";
  // print "<td>".$_SESSION['search'][$i]->pill_id."</td>";
  print "<td>".$_SESSION['search'][$i]->name."</td>";
  // print "<td>".$_SESSION['search'][$i]->labeler."</td>";
  print "</tr>";
}// end for display pills


//print "<td>".$_SESSION['search'][0]->pill_id."</td>";
//print "<td>".$_SESSION['search'][0]->imageUrl."</td>";



print "</tbody>";

print "</table>";





}// end if is set



?>





<?php
include '../menu.php';
?>

<?php
$servername = "localhost";
$username = "esphung";
$password = "esphung";
$dbname = "esphung_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

for ($i = 0; $i < count($pillArray); $i++) {
  $sql = "INSERT INTO SEARCHED (user_id, pill_id, pill_name)
  VALUES (
    '".$user->id_num."',
    '".$pillArray[$i]->pill_id."',
    '".$pillArray[$i]->name."')";

  if ($conn->query($sql) === TRUE) {
      //echo "New record created successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}



$conn->close();
?>

</div>
</body>
</html>

