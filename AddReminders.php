<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Reminders</title>
</head>

<body>

<?php
session_start();
// Variables
$NameofEvent=$_POST["NameofEvent"];
$EventText=$_POST["EventText"];
$EventDate=$_POST["EventDate"];
$EventAssignedTo=$_POST["EventAssignedTo"];




$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
    die("Error Connecting! " . $conn->connect_error);
}
// Executing Query
	$sql = "INSERT INTO futureevents(EventAssignedTo, NameofEvent,EventText,EventDate)
	VALUES ('$EventAssignedTo','$NameofEvent','$EventText','$EventDate')";
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>New Reminder Added</font> <br><br>
		 <a href="AddRemindersForm.php"><button input type="Submit" value="">Add New Reminder</button>
		  <a href="MembersAreaUI.html"><button input type="Submit" value="">Homepage</button>
		 </form>
		 </div>
		 </div> ';
} 
else {
	// Error Message
    echo "Error Adding Reminder!" . $conn->error;
}
$conn->close();
?>
</body>
</html>