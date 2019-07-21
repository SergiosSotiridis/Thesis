<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "SergiosSeniorProject";
$conn = new mysqli($servername,$username,$password,$database);


$sql = "CREATE TABLE Residents(
Resident ID int NOT NULL AUTO_INCREMENT,
ResidentFullName varchar(20),
AssignedTo  varchar(20),
FlatNumber  varchar(20),
BuildingAssignedTo  varchar(20),
ResidentExpAmount  varchar(20),
PRIMARY KEY (ResidentID)
)";

	if ($conn->query($sql) === TRUE) {
    echo "Database Created!";
} else {
    echo "Error Creating Database  " . $conn->error;
}
$conn->close();
?>