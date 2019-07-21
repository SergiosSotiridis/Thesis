<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "SergiosSeniorProject";
$conn = new mysqli($servername,$username,$password,$database);


$sql = "CREATE TABLE Accounts(
ReceiptID int NOT NULL AUTO_INCREMENT,
ResidentID int(20),
PaidTo  varchar(30),
Amount  int(20),
MonthPaid  varchar(20),
DatePaid  datetime 
)";

	if ($conn->query($sql) === TRUE) {
    echo "Database Created!";
} else {
    echo "Error Creating Database  " . $conn->error;
}
$conn->close();
?>