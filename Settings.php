<html>
<head>
<link rel="stylesheet" type="text/css" href="MembersAreaCSS.css">
<style>
	
	table{
  background-color: white;
  margin-top: 30px;
  margin-left: 500px;
  
  
  }
</style>
<title>Settings </title>
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
$AccountID=$_SESSION["AccountID"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Getting data from db
$sql = "SELECT * FROM accounts WHERE AccountID='$AccountID'";
$result = $conn->query($sql);





//////////////
?>
<table align='center'>
<tr><td>
<ul>
<li><a href="MembersAreaUI.html">Home</a></li>
<li><a href="ChangePasswordForm.php">Change Password</a></li>
<li><a href="ChangeSubscriptionForm.php">Change Subscription</a></li>
</ul>
</td></tr></table>
 

	<table cellspacing="15px" align="center" >
  

<?php
// Showing user data
    while($row = $result->fetch_assoc()) {
        echo "
    <table cellspacing='15px' align='center' >
    <tr>
   
         <th>Username</th> <td>".$row['Username']."</td>
    </tr>
    <tr>
        <th>Email</th> <td>".$row['Email']."</td>
    </tr>
   
    <tr>
        <th>Name</th> <td>".$row['Name']."</td>
   </tr>
    <tr>
        <th>Surname</th> <td>".$row['Surname']."</td>
    </tr>
   
    <tr>
       <th>Home Address</th> <td>".$row['HomeAddress']."</td>
    </tr>
    <tr>
       <th>Postal Code</th> <td>".$row['PostalCode']."</td>
    </tr>
    <tr>
       <th>SubscriptionLevel</th> <td>".$row['SubscriptionLevel']."</td>
        </tr> 
      <tr>
      <th>Maximum Buildings</th> <td>".$row['MaxBuildings']."</td>
      </tr>";

    }

    


//////////////
echo "</table>";
//////////////

$conn->close();
?> 
</body>
</html>