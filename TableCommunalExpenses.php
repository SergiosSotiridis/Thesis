<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "SergiosSeniorProject";
$conn = new mysqli($servername,$username,$password,$database);


$sql = "CREATE TABLE CommunalExpenses(
ExpenseID int NOT NULL AUTO_INCREMENT,
ExpenseAssignedTo varchar(20),
AssignedTo varchar(20),
NameofExpense varchar(20),
AmountofExpense int,
ExpenseMonth date,
PRIMARY KEY (ExpenseID)
)";

	if ($conn->query($sql) === TRUE) {
    echo "Database Created!";
} else {
    echo "Error Creating Database  " . $conn->error;
}
$conn->close();
?>