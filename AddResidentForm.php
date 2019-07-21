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

// Variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SergiosSeniorProject";
$AssignedTo=$_SESSION['Username'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


// Getting data from database
$sql = "SELECT * FROM buildings WHERE AssignedTo='$AssignedTo' ";
$result = $conn->query($sql);
?>

<div class="login-page">
   <div class="form">
    <form class="login-form" action="AddResident.php" method="post">
	<select name='BuildingAssignedTo'>
<?php   while($row = $result->fetch_assoc()){
	echo "<option value='{$row["BuildingID"]}'>{$row["BuildingName"]}</option>";}?>   
</select>	
      <input type="text" name="ResidentFullName" placeholder="Full Name"/>
	  <input type="text" name="ResidentExpAmount" placeholder="Monthly Amount Paid"/>
	  <input type="text" name="FlatNumber" placeholder="Flat Number"/>
      <button input type="submit" value="Add">Add</button>	
    </form>



</body>
</html>