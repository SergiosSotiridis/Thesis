<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Appartement</title>
</head>

<body>

<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Variables
$BuildingAssignedTo=$_POST["BuildingAssignedTo"];
$ResidentFullName=$_POST["ResidentFullName"];
$ResidentExpAmount=$_POST["ResidentExpAmount"];
$FlatNumber=$_POST["FlatNumber"];
$AccountID=$_SESSION["AccountID"];





$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";

$conn = new mysqli($servername, $username, $password,$database);




//Executing Query

	$sql = "INSERT INTO residents(BuildingAssignedTo, ResidentFullName, ResidentExpAmount, FlatNumber, AssignedTo)
	VALUES ('$BuildingAssignedTo','$ResidentFullName','$ResidentExpAmount','$FlatNumber','$AccountID')";
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>New Resident Added</font> <br><br>
		 <a href="AddResidentForm.php"><button input type="Submit" value="">Add New Resident</button>
		  <a href="MembersAreaUI.html"><button input type="Submit" value="">Homepage</button>
		 </form>
		 </div>
		 </div> ';

} else {

	// Error Message
    echo "Error Adding Building!" . $conn->error;
}



$conn->close();
?>
</body>
</html>