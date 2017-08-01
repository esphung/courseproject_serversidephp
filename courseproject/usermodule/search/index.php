<?php
session_start();

// included files
//include '../functions.php';
include '../../classes.php';


if (isset($_SESSION['login_user'])) {
    //echo "you are logged in\n<br>";
    //echo $_SESSION['login_user'];

    $user = new User();
    $user->getMyRecord($_SESSION['login_user']);


} else {
// redirect to login page
header("Location: ../signin");
}

?>
<!-- 
FILENAME:       search.php
AUTHOR:         eric phung
PURPOSE:        find pill form (lab 1 basic input form)
DATE:           2017.07.01
$$$$$$\  $$$$$$$$\  $$$$$$\  $$$$$$$\   $$$$$$\  $$\   $$\
$$  __$$\ $$  _____|$$  __$$\ $$  __$$\ $$  __$$\ $$ |  $$ |
$$ /  \__|$$ |      $$ /  $$ |$$ |  $$ |$$ /  \__|$$ |  $$ |
\$$$$$$\  $$$$$\    $$$$$$$$ |$$$$$$$  |$$ |      $$$$$$$$ |
\____$$\ $$  __|   $$  __$$ |$$  __$$< $$ |      $$  __$$ |
$$\   $$ |$$ |      $$ |  $$ |$$ |  $$ |$$ |  $$\ $$ |  $$ |
\$$$$$$  |$$$$$$$$\ $$ |  $$ |$$ |  $$ |\$$$$$$  |$$ |  $$ |
\______/ \________|\__|  \__|\__|  \__| \______/ \__|  \__|

-->

<?php
include '../../htmlTopPage.html';
//css and javascript locations
include '../assets.php';
?>


<title>Search | Pill Identi🔥</title>
</head>

<body>


<div class="container">

<!-- <h1 id="title">Search Page</h1> -->
<h2>Enter Information Here</h2>
<!-- form for user registration input -->
<div class="container">
<form data-toggle="validator" id="form" method="POST" action="search.php">

<div class="form-group">
    <!-- first name field -->
    <label for="imprint" class="control-label"><b>Pill Imprint</b></label>
    <br>
    <input id='imprint' class="autoinput form-control" type="text" placeholder="Enter Imprint" name="imprint" required>
</div>
<!-- Color dropdown field -->
<label for="color"><b>Color</b></label>
<div class="dropdown form-group">
    <select id="color" class="form-control" name="color">
        <option value="Black">Black</option>
        <option value="Blue">Blue</option>
        <option value="Brown">Brown</option>
        <option value="Gray">Gray</option>
        <option value="Green">Green</option>
        <option value="Orange">Orange</option>
        <option value="Pink">Pink</option>
        <option value="Purple">Purple</option>
        <option value="Red">Red</option>
        <option value="Turquoise">Turquoise</option>
        <option value="White">White</option>
        <option value="Yellow">Yellow</option>
        <!-- <option value="four">Four</option> -->
        <!-- <option value="five">Five</option> -->
    </select>
</div>
<!-- shape dropdown field -->
<label for="shape"><b>Shape</b></label>
<div class="dropdown form-group">
    <select id="shape" class="form-control" name="shape">
        <option value="Bullet">Bullet</option>
        <option value="Capsule">Capsule</option>
        <option value="Clover">Clover</option>
        <option value="Diamond">Diamond</option>
        <option value="Double Circle">Double Circle</option>
        <option value="Freeform">Freeform</option>
        <option value="Gear">Gear</option>
        <option value="Heptagon">Heptagon</option>
        <option value="Hexagon">Hexagon</option>
        <option value="Octagon">Octagon</option>
        <option value="Oval">Oval</option>
        <option value="Pentagon">Pentagon</option>
        <option value="Rectangle">Rectangle</option>
        <option value="Round">Round</option>
        <option value="Semi-Circle">Semi-Circle</option>
        <option value="Square">Square</option>
        <option value="Tear">Tear</option>
        <option value="Trapezoid">Trapezoid</option>
        <!-- <option value="four">Four</option> -->
        <!-- <option value="five">Five</option> -->
    </select>
</div>
<br>
<!-- terms and policy checklist -->
<div class="form-group">
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    <!-- <a href='..' class='btn btn-primary'>Back</a> -->
</div>

</form>


</div>

<?php
include '../menu.php';
?>

</div>
<!-- end body div -->
</body>

</html>
