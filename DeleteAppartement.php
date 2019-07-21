<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Appartement</title>
</head>

<body>

<?php
session_start();

// Variables
$BuildingID=$_GET["id"];
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
	$sql = "DELETE FROM buildings WHERE BuildingID='$BuildingID' AND AssignedTo='$AssignedTo' ";
	
	
	if ($conn->query($sql) === TRUE) {
    echo
	     header("Location: MyAppartements.php");
} 
else {
	// Error Message
    echo "Error!" . $conn->error;
}
$conn->close();
?>
</body>
</html>