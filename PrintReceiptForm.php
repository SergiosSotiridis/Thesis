<html>
<head>
<title>Print Receipt</title>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
</head>

<body>

  <?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SergiosSeniorProject";
$AssignedTo=$_SESSION["Username"];
$AccountID=$_SESSION["AccountID"];
$ReceiptID=$_GET["ResidentPaymentID"];
$ResidentID=$_GET["ResidentIDD"];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
/////////// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Getting data from db
$sql = "SELECT * FROM residents WHERE ResidentID='$ResidentID'";
$result = $conn->query($sql);


$row = $result->fetch_assoc(); 


$sql2 = "SELECT * FROM expensespaid WHERE ReceiptID='$ReceiptID' ";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc(); 


$sql3 = "SELECT * FROM accounts WHERE Username='$AssignedTo' ";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc(); 

$sql4 = "SELECT * FROM buildings WHERE AssignedTo='$AssignedTo' ";
$result4 = $conn->query($sql4);
$row4 = $result4->fetch_assoc(); 
//////////

?>
<link rel="stylesheet" type="text/css" href="Senior Project.css">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">

<div class="login-page">
   <div class="form">
    <form class="login-form" action="PrintReceipt.php" method="post">
    <input type="text" name="Date" value="<?php echo $row2['DatePaid'] ; ?>"/>
    <input type="text" name="Building" value="<?php echo $row4['BuildingName'] ; ?>"/>
    <input type="text" name="Period" value="<?php echo $row2['MonthPaid'] ; ?>"/>
		<input type="text" name="Address" value="<?php echo $row4['BuildingAddress'] ; ?>"/>
	  <input type="text" name="Flat" value="<?php echo $row['FlatNumber'] ; ?>"/>
	  <input type="text" name="PaidBy" value="<?php echo $row['ResidentFullName'] ; ?>"/>
	  <input type="text" name="ReceivedBy" value="<?php echo $row3['Name'] ; ?>"/>
	  <input type="text" name="Amount" value="<?php echo $row2['Amount'] ; ?>"/>
      <button input type="submit" value="Add">Create Receipt</button>	  
    </form>
  </div>
</div> 





</body>
</html>