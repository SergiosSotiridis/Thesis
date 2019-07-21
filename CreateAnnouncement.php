<html>
<head>
	<meta charset="8-utf"/>
<title>Announcements</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="ReceiptCSS.css">
<style>
body{
 background-image: url("Photo/Blur.jpg");
 background-size: cover;
 background-repeat: no-repeat;
}

button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-left: 1100px;


  font-size: 16px;
}
t-decoration: none;
}

table {
	
	margin-top: 200px;
	margin-bottom: 200px;
	margin-left: 500px;
	margin-right: 500px;
	border-spacing: 15px;
    border: 1px solid black;
	background-color: silver;
	font-size: 18px;
}
</style>
<script>
function myFunction() {
  window.print();
}
</script>
</head>

<body>
<?php
session_start();
// Variables
$NameofAnnouncement=$_POST["NameofAnnouncement"];
$AnnouncementText=$_POST["AnnouncementText"];
$AnnouncementDate=$_POST["AnnouncementDate"];
$AnnouncementAssignedTo=$_POST["AnnouncementAssignedTo"];
$AssignedTo=$_SESSION["Username"];

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
    die("Error Connecting! " . $conn->connect_error);
}

// Executing Query
	$sql = "INSERT INTO announcements(NameofAnnouncement, AnnouncementText, AnnouncementDate, AnnouncementAssignedTo, AssignedTo)
	VALUES ('$NameofAnnouncement','$AnnouncementText','$AnnouncementDate','$AnnouncementAssignedTo','$AssignedTo')";
	
	if ($conn->query($sql) === TRUE) {

    echo "
<div class='container'>
<table>
<tr>
<td><h1>ANNOUNCEMENT</h1></td><td></td>
</tr>
<tr>
<td><h2><b>$NameofAnnouncement<b></h2><br><h2> $AnnouncementText </h2></td><td></td>
</tr>
<tr>
<td>Administrator(Signature)_________________________</td><td>Building: $AnnouncementAssignedTo</td>&nbsp&nbsp<td>&nbsp&nbspDate:$AnnouncementDate</td>
</tr>
</table>
</div>";




} 
else {
	// Error Message
    echo "Error Creating Announcement" . $conn->error;
}
$conn->close();
?>
<div>
	
	<button onclick="myFunction()">Print</button>
  <br><br>
	<a href="MembersAreaUI.html"><button id="Homepage">Homepage</button></a>	

</div>


	


</body>
</html>

