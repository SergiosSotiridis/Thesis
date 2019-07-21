<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Appartement</title>
</head>

<body>

<?php
session_start();

// Variable
$NewBuildingName=$_POST["NewBuildingName"];
$NewBuildingAddress=$_POST["NewBuildingAddress"];
$NewBuildingPostalCode=$_POST["NewBuildingPostalCode"];
$NewNumberOfFlats=$_POST["NewNumberOfFlats"];
$NewYearOfConstruction=$_POST["NewYearOfConstruction"];
$BuildingID=$_POST["BuildingID"];
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
	$sql = "UPDATE buildings
			SET BuildingName='$NewBuildingName', BuildingAddress='$NewBuildingAddress', BuildingPostalCode='$NewBuildingPostalCode', NumberOfFlats='$NewNumberOfFlats',
			     YearOfConstruction='$NewYearOfConstruction'
			WHERE BuildingID='$BuildingID' ";
	
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>Building Edited</font> <br><br>
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