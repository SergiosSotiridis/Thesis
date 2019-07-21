<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Edit Reminder</title>
</head>

<body>

<?php
session_start();
// Variables
$NewNameofEvent=$_POST["NewNameofEvent"];
$NewEventText=$_POST["NewEventText"];
$NewEventDate=$_POST["NewEventDate"];
$FutureEventID=$_POST["FutureEventID"];


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
    die("Error Connecting! " . $conn->connect_error);
}
// Executing Query
	$sql = "UPDATE futureevents
			SET  EventText='$NewEventText', EventDate='$NewEventDate',NameofEvent='$NewNameofEvent'
			WHERE FutureEventID='$FutureEventID' ";
	
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>Expense Edited</font> <br><br>
		 <a href="MyAppartements.php"><button input type="Submit" value="">Back</button>
		 <a href="MembersAreaUI.html"><button input type="Submit" value="">Homepage</button>
		 </form>
		 </div>
		 </div> ';
} 
else {
	// Error Message
    echo "Error!" . $conn->error;
}
$conn->close();
?>
</body>
</html>