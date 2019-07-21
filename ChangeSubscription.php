<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Appartement</title>
</head>

<body>

<?php
session_start();
// Variables
$NewSubscriptionLevel=$_POST["NewSubscriptionLevel"];
$AccountID=$_SESSION["AccountID"];
$Username=$_SESSION["Username"];


$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";

$conn = new mysqli($servername, $username, $password,$database);

// If condition to assign the maximum buildings according to Account Subscription.
if($NewSubscriptionLevel==1){
	$NewMaxBuildings='1';
}
elseif($NewSubscriptionLevel==2){
	$NewMaxBuildings='3';
}
else{
	$NewMaxBuildings='99';
}

if ($conn->connect_error) {
    die("Error Connecting! " . $conn->connect_error);
}

// Executing Query
	$sql = "UPDATE accounts
			SET  SubscriptionLevel='$NewSubscriptionLevel', MaxBuildings='$NewMaxBuildings'
			WHERE AccountID='AccountID' AND Username='$Username'";
	
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>Subscription Changed</font> <br><br>
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