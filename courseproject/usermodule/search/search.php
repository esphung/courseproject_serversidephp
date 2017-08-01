<!--
FILE:     search.php
AUTHOR:   eric phung
DATE:     2017.06.28
PURPOSE:  	search for a pill
 -->





<?php
session_start();

include '../../classes.php';
include '../../functions.php';
include '../assets.php';
?>


<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset='utf-8'>
    <title>Pill Search</title>
</head>
<body id='body'>
<div class='container'>
<h2 id='title'>Search Results</h2>
<?php
/*
// sanitize values
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
} // end test_input() function def
*/
// Start the session
//session_start();

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
  print "<td><img class='img-thumbnail' src='".$_SESSION['search'][$i]->imageUrl."' alt='Mountain View'></td>";
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

</div>
</body>
</html>

