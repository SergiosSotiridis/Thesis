<html>
<head>
<title>Registration</title>
</head>

<?php

// Variables
$Username=$_POST["Username"];
$Password=$_POST["Password"];
$Name=$_POST["Name"];
$Surname=$_POST["Surname"];
$Email=$_POST["Email"];
$DoB=$_POST["DoB"];
$HomeAddress=$_POST["HomeAddress"];
$PostalCode=$_POST["PostalCode"];
$SubscriptionLevel=$_POST["SubscriptionLevel"];


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "SergiosSeniorProject";

$conn = new mysqli($servername, $username, $password,$database);

// Assigning maximum buildings according to account subscription
if($SubscriptionLevel==1){
	$MaxBuildings='1';
}
elseif($SubscriptionLevel==2){
	$MaxBuildings='3';
}
else{
	$MaxBuildings='99';
}


if ($conn->connect_error) {
    die("Error Connecting! " . $conn->connect_error);
}
// Executing Query
	$sql = "INSERT INTO accounts (Username, Password, Name, Surname, Email, DoB, HomeAddress, PostalCode, SubscriptionLevel,MaxBuildings)
	VALUES ('$Username','$Password','$Name','$Surname','$Email','$DoB','$HomeAddress','$PostalCode','$SubscriptionLevel','$MaxBuildings')";
	
	if ($conn->query($sql) === TRUE) {
    echo  header('Location: RegistrationSuccessful.php');
} else {
	// Error Message
   echo header('Location: RegistrationFailed.php'). $conn->error;
}
$conn->close();
?>
<td><br><a href="Login Form.php">Login</td>
</html>