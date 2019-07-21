<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "SergiosSeniorProject";
$conn = new mysqli($servername,$username,$password,$database);


$sql = "CREATE TABLE Accounts(
AccountID int NOT NULL AUTO_INCREMENT,
Username varchar(20),
Password  varchar(20),
Email  varchar(20),
Name  varchar(20),
Surname  varchar(20),
DoB  date,
HomeAddress  varchar(50),
PostalCode  int,
SubscriptionLevel int(20),
MaxBuildings int(20),
PRIMARY KEY (AccountID)
)";

	if ($conn->query($sql) === TRUE) {
    echo "Database Created!";
} else {
    echo "Error Creating Database  " . $conn->error;
}
$conn->close();
?>