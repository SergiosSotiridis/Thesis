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

<title>My Residents </title>
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
<table align='center'>
<tr><td>
<ul>
<li><a href="MembersAreaUI.html"><img src="Photo/home-symbol.png" height=30px width="30px">   Home</a></li>
<li><a href="AddResidentForm.php?"><img src="Photo/plus.png" height=30px width="30px">   Add New Resident</a></li>
<li><a href="MyAppartements.php"><img src="Photo/back.png" height=30px width="30px">   Back</a></li>
</ul>
</td></tr></table>

<table frame="box" id="BuildingTable" cellspacing="15px" align="center" >
                <thead>
                    <tr>
                        <th>Resident Full Name</th>
                        <th>Flat Number</th>
                        <th>Monthly Payment</th>
                        </tr>
                </thead>
<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SergiosSeniorProject";
$AssignedTo=$_SESSION["Username"];
$BuildingAssignedTo=$_GET['id'];





// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



// Getting data from table residents.

$sql = "SELECT * FROM residents WHERE BuildingAssignedTo='$BuildingAssignedTo'";
                    $res = mysqli_query($conn, $sql);
                    if ($resultCheck = mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            
                            $_SESSION['ResidentID'] = $row['ResidentID'];
                            $ResidentID=$_SESSION['ResidentID'];

 		
         


?>

                <tbody>
                    <?php
                    
                            // Showing results in a table.
                            echo "<tr>";
                            echo '<td><a href="ResidentPayments.php?ResidentID=' . $row['ResidentID'] . '">'; echo" {$row["ResidentFullName"]}</a></td>";
                            echo "<td>{$row["FlatNumber"]}</td>";
                            echo "<td>€ {$row["ResidentExpAmount"]}</td>";
                            echo '<td><a href="PayCommunalExpenses.php?ResidentID=' . $row['ResidentID'] . '">&nbsp<img src="Photo/hand.png" height=20px width="20px"><br>Pay</a></td>';
                            echo '<td><a href="EditResidentForm.php?ResidentID=' . $row['ResidentID'] . '">&nbsp<img src="Photo/edit.png" height=20px width="20px"><br>Edit</a></td>';
							echo '<td><a href="DeleteResident.php?ResidentID=' . $row['ResidentID'] . '">&nbsp&nbsp<img src="Photo/delete.png" height=20px width="20px"><br>Delete</a></td>';
							
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