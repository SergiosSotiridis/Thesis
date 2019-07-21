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

// Getting data from db

$sql = "SELECT * FROM buildings WHERE AssignedTo='$AssignedTo' ";
$result = $conn->query($sql);
// Sum Form
?>

<div class="login-page">
   <div class="form">
    <form class="login-form" action="Sum.php" method="post">
    	<select   name="ExpenseMonth" >
    <option value="">Select Month</option>
  <option value="January">January</option>
  <option value="February">February</option>
  <option value="March">March</option>
  <option value="April">April</option>
  <option value="May">May</option>
  <option value="June">June</option>
  <option value="July">July</option>
  <option value="August">August</option>
  <option value="September">September</option>
  <option value="October">October</option>
  <option value="November">November</option>
  <option value="December">December</option>
</select>
    	<select name='ExpenseAssignedTo'>
  <option value="">Select Building</option>
    	<?php   while($row = $result->fetch_assoc()){
  echo "<option value='{$row["BuildingID"]}'>{$row["BuildingName"]}</option>";}?>   
</select> 
      
   
      <button input type="submit" value="Add">Sum Up</button>	
    </form>



</body>
</html>