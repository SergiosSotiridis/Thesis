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
$FutureEventID=$_GET["FutureEventID"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Getting data from DB
$sql = "SELECT * FROM futureevents WHERE FutureEventID='$FutureEventID'";
$result = $conn->query($sql);


$row = $result->fetch_assoc(); 



// Edit Form
?>

<div class="login-page">
   <div class="form">
    <form class="login-form" action="EditReminder.php" method="post">
      <input type="text" name="NewNameofEvent" value="<?php echo $row['NameofEvent'] ; ?>"/>
  	  <input type="text" name="NewEventText" value="<?php echo $row['EventText'] ; ?>"/>
	   <select   name="NewEventDate" >
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
<input type="hidden" name="FutureEventID" value="<?php echo $row['FutureEventID'] ; ?>"/>
      <button input type="submit" value="Add">Edit</button>	
    </form>



</body>
</html>