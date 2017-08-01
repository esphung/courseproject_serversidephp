<?php
include 'htmlTopPage.html';
?>

<title>Pill Identi🔥</title>
<!-- <link href="" rel="stylesheet"> -->


<!-- inline css for landing page -->
<style type="text/css" media="screen">

body, html {
height: 100%;
  font-family: Permanent Marker;
  font-size:32px;
  font-style: normal;
  font-variant: normal;
  font-weight: 500;
  /*line-height: 26.4px;*/


  color: #473E3F;
}
.bg { 
/* The image used */
background: url(landingpagebackgroundimage.png);

/* Full height */
height: 100%; 

/* Center and scale the image nicely */
background-position: center;
background-repeat: no-repeat center center fixed; 
-webkit-background-size:  cover;
-moz-background-size:  cover;
-o-background-size:  cover;
background-size: cover;
background-position: center top;
}

.buttonMenu { 
position: absolute;
height: 100%;
right: 0;
bottom: 0;
}

#loginBtn{
    border: none;
    /*height: 120px;*/
    background-color: transparent;
}
#registerBtn{
    border: none;
    /*width: 768px;*/
    /*height: 120px;*/
    background-color: transparent;
}

button.cleared {
    border:0;
    background:transparent;

}

a {
  color: #473E3F;
}

a:hover {
  color: #D25C3A;
}

</style>

<?php
//include 'courseproject/usermodule/assets.php';
?>

</head>
<body id ="body">
<div class="bg container">



<div class="btn-group-vertical buttonMenu" role="group" aria-label="Basic example">

	<!-- login button link -->
	<button class="cleared" onclick='location.href="http://corsair.cs.iupui.edu:20291/courseproject/usermodule/signin"'><img id="loginBtn" class='img-thumbnail' src="login_btn_image.png" alt='login button image'></button>
	<!-- register button link -->
	<button type='button' class="cleared" onclick='location.href="http://corsair.cs.iupui.edu:20291/courseproject/usermodule/register"'><img id="registerBtn" class='img-thumbnail' src="register_btn_image.png" alt='register button image'></button>
<!-- 	<button type='button' class="cleared" onclick='location.href="http://corsair.cs.iupui.edu:20291/courseproject/usermodule/register"'><img id="registerBtn" class='img-thumbnail' src="register_btn_image.png" alt='register button image'></button> -->
<div>
<a href="servermodule/login" title="servermodule" style='position: absolute;
  right: 0;
  bottom: 0;'>
  Administration&nbsp;
  </a>


</div>

</div>




</div>



<!-- <img id="registerBtn" class="img-fluid" src="register_btn_image.png" alt="register button box"></div> -->
<!-- <div id="box_2"></div> -->


<!-- inline javascript for redirects and overlayed links -->
<script type="text/javascript">

$(document).ready(function() {
// // This WILL work because we are listening on the 'document', 
// // for a click on an element with an ID of #test-element
// $(document).on("click","#test-element",function() {
//     alert("click bound to document listening for #test-element");
// });

// // This will NOT work because there is no '#test-element' ... yet
// $("html").on("click",function() {
//     window.open("http://corsair.cs.iupui.edu:20291/courseproject/usermodule/login");
// });

});

</script>

</body>
</html>