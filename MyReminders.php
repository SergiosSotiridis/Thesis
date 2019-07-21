<html>
<head>
<link rel="stylesheet" type="text/css" href="MembersAreaCSS.css">
<title>My Reminders </title>
<style>
	table{
  background-color: white;
  margin-top: 30px;
  margin-left: 500px;
  
  
  }
	a{
  text-decoration: none;
   color: #0060B6;
}
</style>
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
$EventAssignedTo=$_GET["id"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Getting data from db
$sql = "SELECT * FROM futureevents WHERE EventAssignedTo='$EventAssignedTo'";
$result = $conn->query($sql);
//////////////
?>
<table align='center'>
<tr><td>
<ul>
<li><a href="MembersAreaUI.html"><img src="Photo/home-symbol.png" height='30px' width="30px">   Home</a></li>
<li><a href="AddRemindersForm.php"><img src="Photo/plus.png" height='30px' width="30px">   Add New Reminder</a></li>
<li><a href="MyAppartements.php"><img src="Photo/back.png" height='30px' width="30px">   Back</a></li>
</ul>
</td></tr></table>

	  <table frame="box" id="BuildingTable" cellspacing="15px" align="center" >
      <tr>
        <th>Reminder Name</th>
        <th>Details</th>
        <th>Due Date</th>
        </tr>


<?php

    while($row = $result->fetch_assoc()) {
        $_SESSION['FutureEventID'] = $row['FutureEventID'];
        echo "<tr>";
        echo " <th>{$row["NameofEvent"]}</th>";
        echo " <th>{$row["EventText"]}</th>";
        echo " <th>{$row["EventDate"]}</th>";
        echo '<td><a href="EditRemindersForm.php? FutureEventID=' . $row['FutureEventID'] . '">&nbsp<img src="Photo/edit.png" height=20px width="20px"><br>Edit</a></td>';
        echo '<td><a href="DeleteReminder.php?FutureEventID=' . $row['FutureEventID'] . '">&nbsp&nbsp<img src="Photo/delete.png" height=20px width="20px"><br>Delete</a></td>';
        echo " </tr>";
    }

//////////////
echo "</table>";
//////////////

$conn->close();
?> 
</body>
</html>