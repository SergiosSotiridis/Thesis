<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Expenses</title>
</head>

<body>

<?php
session_start();

// Variables
$NameofExpense=$_POST["NameofExpense"];
$AmountofExpense=$_POST["AmountofExpense"];
$ExpenseMonth=$_POST["ExpenseMonth"];
$ExpenseAssignedTo=$_POST["ExpenseAssignedTo"];
$AssignedTo=$_SESSION["Username"];




$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
    die("Error Connecting! " . $conn->connect_error);
}
//Executing Query
	$sql = "INSERT INTO communalexpenses (AssignedTo,ExpenseAssignedTo, NameofExpense, AmountofExpense,ExpenseMonth)
	VALUES ('$AssignedTo','$ExpenseAssignedTo','$NameofExpense','$AmountofExpense','$ExpenseMonth')";
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>New Expense Added</font> <br><br>
		 <a href="AddExpenseForm.php"><button input type="Submit" value="">Add New Expense</button>
		 <a href="MembersAreaUI.html"><button input type="Submit" value="">Homepage</button>
		 </form>
		 </div>
		 </div> ';
} 
else {
    echo "Error Adding Expense!" . $conn->error;
}
$conn->close();
?>
</body>
</html>