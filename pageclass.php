<?php
class Page{

    var $pagename;
    var $subtitle;
    var $bodyhtml;

    public function __construct($pagename,$subtitle,$bodyhtml){
    	$this->pagename = $pagename;
    	$this->subtitle = $subtitle;
    	$this->bodyhtml = $bodyhtml;
    	$myFile = $this->pagename.".php"; // or .php
    	$fh = fopen($myFile, 'w'); // or die("error");
    	// header
    	$headerData = "
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>

<?php
//css and javascript
include 'assets.php';
?>
<title>
		";
		fwrite($fh, $headerData);
		fwrite($fh, ucwords($pagename));

		$stringData ="
</title>
	</head>
	<body>
		<div class='container'><h1>";
		fwrite($fh, $stringData);
		fwrite($fh, ucwords($pagename));

		$stringData = "</h1>
	<div class='menu'>
	    <?php include 'menu.php';?>
	</div>
	<h3 id='subtitle'>";
		fwrite($fh, $stringData);

		$stringData = ucwords($subtitle);

		fwrite($fh, $stringData);

		$stringData = 
			"</h3>
			
	<label id='labelinfo'>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</label>

<div class='container'>";
fwrite($fh, $stringData);

fwrite($fh, $bodyhtml);

$stringData = "</div></div></body>
</html>

		";
		fwrite($fh, $stringData);


		fclose($fh);
        
    }// end construction
}// end page def
?>