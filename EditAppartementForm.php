<html>
<head>
	<link rel="stylesheet" type="text/css" href="MembersAreaCSS.css">
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<link rel="stylesheet" type="text/css" href="Senior Project.css">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">


</head>
<body>


<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SergiosSeniorProject";
$AssignedTo=$_SESSION["Username"];
$BuildingID=$_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM buildings WHERE BuildingID='$BuildingID'";
$result = $conn->query($sql);


$row = $result->fetch_assoc(); 

?>

<div class="login-page">
   <div class="form">
    <form class='login-form' action='EditAppartement.php' method="post">
      <input type='text' name="NewBuildingName" value="<?php echo $row['BuildingName'] ; ?>"/>
      <input type="text" name="NewBuildingAddress" value="<?php echo $row['BuildingAddress'] ; ?>"/>
	  <input type="text" name="NewBuildingPostalCode" value="<?php echo $row['BuildingPostalCode'] ; ?>"/>
	  <input type="text" name="NewNumberOfFlats" value="<?php echo $row['NumberOfFlats'] ; ?>"/>
	  <input type="text" name="NewYearOfConstruction" value="<?php echo $row['YearOfConstruction'] ; ?>"/>
    <input type="hidden" name="BuildingID" value="<?php echo $row['BuildingID'] ; ?>"/>
      <button input type="submit" value="Add">Update</button>
      
    </form>









</body>
</html>