<html>
<head>
<link rel="stylesheet" type="text/css" href="MembersAreaCSS.css">
<style>
	
	table{
  background-color: white;
  margin-top: 30px;
  margin-left: 500px;
   
  }

  th {
     text-decoration: none;
  }
</style>
<title>My Expenses </title>
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
$ExpenseAssignedTo=$_POST["ExpenseAssignedTo"];
$ExpenseMonth=$_POST["ExpenseMonth"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//////// Getting data from db
$sql3 = "SELECT SUM(Amount) as Amount FROM expensespaid
WHERE MonthPaid='$ExpenseMonth'
AND PaidTo='$ExpenseAssignedTo' ";

$result3 = $conn->query($sql3);
$data2 = mysqli_fetch_array($result3);

$sql2 = "SELECT SUM(AmountofExpense) as AmountofExpense FROM communalexpenses
WHERE AssignedTo='$AssignedTo'
AND ExpenseMonth='$ExpenseMonth' 
AND ExpenseAssignedTo='$ExpenseAssignedTo' ";

$result2 = $conn->query($sql2);
$data = mysqli_fetch_array($result2);

$sql = "SELECT * FROM communalexpenses
 WHERE AssignedTo='$AssignedTo' 
 AND ExpenseMonth='$ExpenseMonth'
 AND ExpenseAssignedTo='$ExpenseAssignedTo'";
$result = $conn->query($sql);
//////////////
?>


<table align='center'>
<tr><td>
<ul>
<li><a href="MembersAreaUI.html"><img src="Photo/home-symbol.png" height=30px width="30px">   Home</a></li>
<li><a href="AddExpenseForm.php"><img src="Photo/plus.png" height='30px' width="30px">   Add New Expense</a></li>
<li><a href="SumForm.php"><img src="Photo/calculator.png" height='30px' width="30px">   Sum Expenses</a></li>

</ul>
</td></tr></table>
 

	<table  cellspacing="15px" align="center" >
    <tr>
      <th>Name</th>
      <th>Amount</th>
      <th>Month</th>
    </tr>

<?php
// Showing expenses

    while($row = $result->fetch_assoc()) {

         $_SESSION['ExpenseID'] = $row['ExpenseID'];
        echo "<tr>";
        echo "<th>{$row["NameofExpense"]}</th>";
        echo "<th>€ {$row["AmountofExpense"]}</th>";
        echo "<th>{$row["ExpenseMonth"]}</th>";
        echo '<td><a href="EditExpenseForm.php?ExpenseID=' . $row['ExpenseID'] . '">Edit</a></td>';
        echo '<td><a href="DeleteExpense.php?ExpenseID=' . $row['ExpenseID'] . '">Delete</a></td>';
        echo "</tr> ";

    }

    $GrantResult= $data2['Amount']- $data['AmountofExpense'];


// Calculations
echo"<td><b>Available Amount:</b></td>";
echo"<td><b>&nbsp&nbsp€  {$data2['Amount']}</b></td>";
echo"<tr>";
echo"<td><b>Total Expenses:</b></td>";
echo"<td><b>&nbsp&nbsp <u>€  {$data['AmountofExpense']}</b></u></td>";
echo"<tr>";
echo"<td><b>Result:</b></td>";
echo"<td><b>&nbsp&nbsp€  $GrantResult</b></td>";
echo "</table>";
//////////////

$conn->close();
?> 
</body>
</html>





