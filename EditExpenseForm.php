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
$ExpenseID=$_GET["ExpenseID"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM communalexpenses WHERE ExpenseID='$ExpenseID'";
$result = $conn->query($sql);


$row = $result->fetch_assoc(); 


$sql2 = "SELECT * FROM buildings WHERE AssignedTo='$AssignedTo' ";
$result2 = $conn->query($sql2);

?>


<div class="login-page">
   <div class="form">
    <form class="login-form" action="EditExpense.php" method="post">
    	<select name='NewExpenseAssignedTo'>
  <option value="">Select Building</option>
<?php   while($row2 = $result2->fetch_assoc()){
  echo "<option value='{$row2["BuildingID"]}'>{$row2["BuildingName"]}</option>";}?>   
</select> 
      <input type="text" name="NewNameofExpense" value="<?php echo $row['NameofExpense'] ; ?>"/>
      <input type="text" name="NewAmountofExpense" value="<?php echo $row['AmountofExpense'] ; ?>"/>
	   <select   name="NewExpenseMonth" >
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
	  <input type="hidden" name="ExpenseID" value="<?php echo $row['ExpenseID'] ; ?>"/>

	  
      <button input type="submit" value="Add">Edit</button>	
    </form>



</body>
</html>