<html>
<head>


<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<link rel="stylesheet" type="text/css" href="Senior Project.css">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">


</head>
<body>

<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SergiosSeniorProject";
$AssignedTo=$_SESSION["Username"];
$ReceiptID=$_GET["ResidentPaymentID"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM ExpensesPaid WHERE ReceiptID='$ReceiptID'";
$result = $conn->query($sql);


$row = $result->fetch_assoc(); 




?>


<div class="login-page">
   <div class="form">
    <form class="login-form" action="EditExpensesPaid.php" method="post">
    

      <input type="text" name="NewAmount" value="<?php echo $row['Amount'] ; ?>"/>
      <select   name="NewMonthPaid" >
    <option value="">Select Month</option>
  <option value="January">January</option>
  <option value="February">February</option>
  <option value="March">March</option>
  <option value="April">April</option>
  <option value="May">May</option>
  <option value="June">June</option>
  <option value="July">July</option>
  <option value="August">August</option>
  <option value="September">September</option>
  <option value="October">October</option>
  <option value="November">November</option>
  <option value="December">December</option>
</select>
	 	  <input type="hidden" name="ReceiptID" value="<?php echo $row['ReceiptID'] ; ?>"/>

	  
      <button input type="submit" value="Add">Edit</button>	
    </form>



</body>
</html>