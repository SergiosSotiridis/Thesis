<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Appartement</title>
</head>

<body>

<?php
session_start();
// Variables
$NewAmount=$_POST["NewAmount"];
$NewMonthPaid=$_POST["NewMonthPaid"];
$ReceiptID=$_POST["ReceiptID"];
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
	$sql = "UPDATE expensespaid
			SET  Amount='$NewAmount', MonthPaid='$NewMonthPaid'
			WHERE ReceiptID='$ReceiptID'  ";
	
	
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