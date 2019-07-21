<html>
<head>


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
$ResidentID=$_GET["ResidentID"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM residents WHERE ResidentID='$ResidentID'";
$result = $conn->query($sql);


$row = $result->fetch_assoc(); 


$sql2 = "SELECT * FROM buildings WHERE AssignedTo='$AssignedTo' ";
$result2 = $conn->query($sql2);

?>


<div class="login-page">
   <div class="form">
    <form class="login-form" action="EditResident.php" method="post">
    	<select name='NewBuildingAssignedTo'>
  <option value="">Select Building</option>
<?php   while($row2 = $result2->fetch_assoc()){
  echo "<option value='{$row2["BuildingID"]}'>{$row2["BuildingName"]}</option>";}?>   
</select> 
    <input type="text" name="NewResidentFullName" value="<?php echo $row['ResidentFullName'] ; ?>"/>
    <input type="hidden" name="NewAssignedTo" value="<?php echo $row['ResidentID'] ; ?>"/>
	  <input type="text" name="NewFlatNumber" value="<?php echo $row['FlatNumber'] ; ?>"/>
    <input type="text" name="NewResidentExpAmount" value="<?php echo $row['ResidentExpAmount'] ; ?>"/>
	  <input type="hidden" name="ResidentID" value="<?php echo $row['ResidentID'] ; ?>"/>

	  
    <button input type="submit" value="Add">Edit</button>	
    </form>



</body>
</html>