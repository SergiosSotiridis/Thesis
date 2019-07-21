<html>
<head>
<link rel="stylesheet" type="text/css" href="Senior Project.css">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
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

?>




<div class="login-page">
   <div class="form">
    <form class="login-form" action="CreateAnnouncement.php" method="post">
      <input type="text" name="NameofAnnouncement" placeholder="Name"/>
      <input type="text"  name="AnnouncementText" placeholder="Details...">
	    <select   name="AnnouncementDate" >
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
    <select name='AnnouncementAssignedTo'>
  <option value="">Select Building</option>
<?php   while($row = $result->fetch_assoc()){
  echo "<option value='{$row["BuildingName"]}'>{$row["BuildingName"]}</option>";}?>   
</select> 
      <button input type="submit" value="Add">Create Receipt</button>	 
	 
    </form>
  </div>
</div> 





</body>
</html>