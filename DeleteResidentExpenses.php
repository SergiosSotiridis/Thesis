<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Appartement</title>
</head>

<body>

<?php
session_start();
// Variables
$ReceiptID=$_GET["ResidentPaymentID"];
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
	$sql = "DELETE FROM expensespaid WHERE ReceiptID='$ReceiptID' ";
	
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>Payment Deleted</font> <br><br>
		 <a href="MyAppartements.php"><button input type="Submit" value="">Back</button>
		  <a href="MembersAreaUI.html"><button input type="Submit" value="">Homepage</button>
		 </form>
		 </div>
		 </div> ';

} else {
	// Error Message
    echo "Error Adding Payment!" . $conn->error;
}

$conn->close();
?>
</body>
</html>