<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("anepitixis syndesi! " . $conn->connect_error);
} 
$sql = "create database SergiosSeniorProject";
if ($conn->query($sql) === TRUE) {
    echo "Succesful Connection!";
} else {
    echo "Error Connecting to Database!" . $conn->error;
}
$conn->close();
?>