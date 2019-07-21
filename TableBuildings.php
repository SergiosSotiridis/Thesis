<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "SergiosSeniorProject";
$conn = new mysqli($servername,$username,$password,$database);


$sql = "CREATE TABLE Buildings(
BuildingID int NOT NULL AUTO_INCREMENT,
AssignedTo varchar(20),
BuildingName varchar(20),
BuildingAddress varchar(20),
BuildingPostalCode int,
NumberOfFlats int(20),
YearOfConstruction int,
PRIMARY KEY (BuildingID)
)";

	if ($conn->query($sql) === TRUE) {
    echo "Database Created!";
} else {
    echo "Error Creating Database  " . $conn->error;
}
$conn->close();
?>