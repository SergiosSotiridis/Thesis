<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Appartement</title>
</head>

<body>

<?php
session_start();
// Variables
$NewResidentFullName=$_POST["NewResidentFullName"];
$NewBuildingAssignedTo=$_POST["NewBuildingAssignedTo"];
$NewAssignedTo=$_POST["NewAssignedTo"];
$NewFlatNumber=$_POST["NewFlatNumber"];
$NewResidentExpAmount=$_POST["NewResidentExpAmount"];
$ResidentID=$_POST["ResidentID"];
$AssignedTo=$_SESSION["Username"];



$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
    die("Error Connecting! " . $conn->connect_error);
}
// Executing Query 
	$sql = "UPDATE residents
			SET  ResidentFullName='$NewResidentFullName',AssignedTo='$NewAssignedTo', FlatNumber='$NewFlatNumber', ResidentExpAmount='$NewResidentExpAmount',BuildingAssignedTo='$NewBuildingAssignedTo'
			WHERE ResidentID='$ResidentID'  ";
	
	
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