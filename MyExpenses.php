<html>
<head>
<link rel="stylesheet" type="text/css" href="MembersAreaCSS.css">
<style>
	
a{
  text-decoration: none;
   color: #0060B6;
}

	table{
  background-color: white;
  margin-top: 30px;
  margin-left: 500px;
  
  
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
$ExpenseAssignedTo=$_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//Getting data from table communalexpenses.
$sql = "SELECT * FROM communalexpenses WHERE AssignedTo='$AssignedTo' AND ExpenseAssignedTo='$ExpenseAssignedTo'";
$result = $conn->query($sql);

?>
<table align='center'>
<tr><td>
<ul>
<li><a href="MembersAreaUI.html"><img src="Photo/home-symbol.png" height='30px' width="30px">   Home</a></li>
<li><a href="AddExpenseForm.php"><img src="Photo/plus.png" height='30px' width="30px">   Add New Expense</a></li>
<li><a href="SumForm.php"><img src="Photo/calculator.png" height='30px' width="30px">   Sum Expenses</a></li>
<li><a href="MyAppartements.php"><img src="Photo/back.png" height='30px' width="30px">   Back</a></li>

</ul>
</td></tr></table>
 

	<table frame="box" id="BuildingTable" cellspacing="15px" align="center" >
    <tr>
      <th>Name</th>
      <th>Amount</th>
      <th>Month</th>
    </tr>

<?php

    while($row = $result->fetch_assoc()) {

         $_SESSION['ExpenseID'] = $row['ExpenseID'];
         //Showing results in a table.
        echo "<tr>";
        echo "<th>{$row["NameofExpense"]}</th>";
        echo "<th>€ {$row["AmountofExpense"]}</th>";
        echo "<th>{$row["ExpenseMonth"]}</th>";
        echo '<td><a href="EditExpenseForm.php?ExpenseID=' . $row['ExpenseID'] . '">&nbsp<img src="Photo/edit.png" height=20px width="20px"><br>Edit</a></td>';
        echo '<td><a href="DeleteExpense.php?ExpenseID=' . $row['ExpenseID'] . '">&nbsp&nbsp<img src="Photo/delete.png" height=20px width="20px"><br>Delete</a></td>';
        echo "</tr> ";

    }

    


//////////////
echo "</table>";
//////////////

$conn->close();
?> 
</body>
</html>