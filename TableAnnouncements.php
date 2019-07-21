<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "SergiosSeniorProject";
$conn = new mysqli($servername,$username,$password,$database);


$sql = "CREATE TABLE Announcements(
AnnouncementID int NOT NULL AUTO_INCREMENT,
AssignedTo varchar(20),
NameofAnnouncement varchar(20),
AnnouncementText varchar(1000),
AnnouncementAssignedTo varchar(20),
AnnouncementDate int,
PRIMARY KEY (AnnouncementID)
)";

	if ($conn->query($sql) === TRUE) {
    echo "Database Created!";
} else {
    echo "Error Creating Database  " . $conn->error;
}
$conn->close();
?>