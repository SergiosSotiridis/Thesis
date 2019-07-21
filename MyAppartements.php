<html>
<head>
<link rel="stylesheet" type="text/css" href="MembersAreaCSS.css">

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>


 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script>
 $(document).ready( function () {
    $('BuildingTable').DataTable();
} );

</script>

<title>My Appartements </title>
<style>

a{
	text-decoration: none;
	 color: #0060B6;
}

    table{
  background-color: white;
  margin-top: 30px;
  margin-left: 500px;
  
  
  }
	a {
text-decoration: none;
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
$AssignedTo=$_SESSION["Username"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Getting data from table buildings.
$sql = "SELECT * FROM buildings WHERE AssignedTo='$AssignedTo'";
$result = $conn->query($sql);


 		
         


?>
<table align='center'>
<tr><td>
<ul>
<li><a href="MembersAreaUI.html"><img src="Photo/home-symbol.png" height=30px width="30px">   Home</a></li>
<li><a href="AddAppartementsForm.php"><img src="Photo/plus.png" height=30px width="30px">   Add New Building</a></li>
<li><a href="CreateAnnouncementForm.php"><img src="Photo/megaphone.png" height=30px width="30px">    Create an Announcement</a></li>


</ul>
</td></tr></table>

<table frame="box" id="BuildingTable" cellspacing="15px" align="center" >
                <thead>
                    <tr>
                        <th>Building Name</th>
                        <th>Building Address</th>
                        <th>Building Postal Code</th>
                        <th>Number Of Flats</th>
                        <th>Year Of Construction</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM buildings WHERE AssignedTo='$AssignedTo'";
                    $res = mysqli_query($conn, $sql);
                    if ($resultCheck = mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            
                            $_SESSION['BuildingID'] = $row['BuildingID'];
                            // Showing results in a table.
                            echo "<tr>";
                            echo '<td><a href="MyResidents.php?id=' . $row['BuildingID'] . '">'; echo" {$row["BuildingName"]}</a></td>";
                            echo "<td>{$row["BuildingAddress"]}</td>";
                            echo "<td>{$row["BuildingPostalCode"]}</td>";
                            echo "<td>{$row["NumberOfFlats"]}</td>";
                            echo "<td>{$row["YearOfConstruction"]}</td>";
                            echo '<td><a href="MyExpenses.php?id=' . $row['BuildingID'] . '">&nbsp&nbsp&nbsp&nbsp&nbsp<img src="Photo/analysis.png" height=20px width="20px"><br>Expenses</a></td>';
                            echo '<td><a href="MyReminders.php?id=' . $row['BuildingID'] . '">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src="Photo/calendar.png" height=20px width="20px"><br>Reminders</a></td>';
							echo '<td><a href="EditAppartementForm.php?id=' . $row['BuildingID'] . '">&nbsp<img src="Photo/edit.png" height=20px width="20px"><br>Edit</a></td>';
							echo '<td><a href="DeleteAppartement.php?id=' . $row['BuildingID'] . '">&nbsp&nbsp<img src="Photo/delete.png" height=20px width="20px"><br>Delete</a></td>';
							
                        }
                    }
                    ?>
                </tbody>
            </table>
<?php
$conn->close();
?> 


</script>
</body>
</html>