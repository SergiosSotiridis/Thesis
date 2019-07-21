<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Payment</title>
</head>

<body>

<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Variables
$MonthPaid=$_POST["MonthPaid"];
$Amount=$_POST["Amount"];
$PaidTo=$_POST["PaidTo"];
$ResidentID=$_POST["ResidentID"];





$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";



$conn = new mysqli($servername, $username, $password,$database);




// Executing Query
	$sql = "INSERT INTO expensespaid(ResidentID,PaidTo, Amount, MonthPaid)
	VALUES ('$ResidentID','$PaidTo','$Amount','$MonthPaid')";
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>Payment Added</font> <br><br>
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