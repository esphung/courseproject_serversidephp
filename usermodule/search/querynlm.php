<!--
FILE:     search.php
AUTHOR:   eric phung
DATE:     2017.06.28
PURPOSE:  	search for a pill
 -->
<?php

// sanitize values
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
} // end test_input() function def

// Start the session
//session_start();

/* function called when submit button tapped */
if(isset($_POST['submit'])) {

	/* store user input as variables */
	$imprint = ($_POST['imprint']);
	$color = ($_POST['color']);
	$shape = ($_POST['shape']);


	/* sanitize input */
	$imprint = test_input($imprint);
	$color = test_input($color);
	$shape = test_input($shape);

  /*.the NLM api only deals with all capital letters for color and shape */
  $color = strtoupper($color);
  $shape = strtoupper($shape);

  // save user's seearch criteria
  $_SESSION["imprint"] = $imprint;
  $_SESSION["color"] = $color;
  $_SESSION["shape"] = $shape;

  //create search object
  $myObj->imprint = $_SESSION["imprint"];
  $myObj->color = $_SESSION["color"];
  $myObj->shape = $_SESSION["shape"];

  //$_SESSION["search"] = $myObj;

  print_r($_SESSION);

  //$myJSON = json_encode($_SESSION["search"]);
  //echo $myJSON;



  // search input into json string
  //$myJSON = json_encode($userSearchObj);
  //echo($myJSON);


}// end if is set





//header('Location: ' . '/courseproject/usermodule/results');
/* end user input request processing function */
?>
