<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Add Appartement</title>
</head>

<body>

<?php
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$BuildingName=$_POST["BuildingName"];
$BuildingAddress=$_POST["BuildingAddress"];
$BuildingPostalCode=$_POST["BuildingPostalCode"];
$NumberOfFlats=$_POST["NumberOfFlats"];
$YearOfConstruction=$_POST["YearOfConstruction"];
$AssignedTo=$_SESSION["Username"];
$MaxBuildings=$_SESSION["MaxBuildings"];
$AccountID=$_SESSION["AccountID"];





$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";

$conn = new mysqli($servername, $username, $password,$database);




// Getting data from database.
 
$sql2= "SELECT * FROM buildings WHERE AssignedTo='$AssignedTo'";
$result = mysqli_query($conn, $sql2);
$count = mysqli_num_rows($result);


// Counting Maximum Buildings
if ($count>=$MaxBuildings){


		echo 
'

 <div class="login-page">
		 <div class="form">
		 <font color=red>You Have Reached your Accounts Limit</font> <br><br>
		  <a href="MembersAreaUI.html"><button input type="Submit" value="">Homepage</button>
		 </form>
		 </div>
		 </div> ';



} else{
// Executing Query
	$sql = "INSERT INTO buildings(BuildingName, BuildingAddress, BuildingPostalCode, NumberOfFlats, YearOfConstruction, AssignedTo)
	VALUES ('$BuildingName','$BuildingAddress','$BuildingPostalCode','$NumberOfFlats','$YearOfConstruction','$AssignedTo')";
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>New Building Added</font> <br><br>
		 <a href="AddAppartementsForm.php"><button input type="Submit" value="">Add New Building</button>
		  <a href="MembersAreaUI.html"><button input type="Submit" value="">Homepage</button>
		 </form>
		 </div>
		 </div> ';

} else {
	// Error Message
    echo "Error Adding Building!" . $conn->error;
}

}

$conn->close();
?>
</body>
</html>