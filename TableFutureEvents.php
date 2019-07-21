<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "SergiosSeniorProject";
$conn = new mysqli($servername,$username,$password,$database);


$sql = "CREATE TABLE FutureEvents(
FutureEventID int NOT NULL AUTO_INCREMENT,
EventAssignedTo varchar(20),
NameofEvent varchar(20),
EventText varchar(800),
EventDate int,
PRIMARY KEY (FutureEventID)
)";

	if ($conn->query($sql) === TRUE) {
    echo "Database Created!";
} else {
    echo "Error Creating Database  " . $conn->error;
}
$conn->close();
?>