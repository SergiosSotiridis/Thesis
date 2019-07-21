<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Change Password</title>
</head>

<body>

<?php
session_start();
	
// Variables
$NewPassword=$_POST["NewPassword"];
$Username=$_SESSION["Username"];
$AccountID=$_SESSION["AccountID"];



$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "sergiosseniorproject";

$conn = new mysqli($servername, $username, $password,$database);



// Executing Query
	$sql = "UPDATE accounts
			SET  Password='$NewPassword', Name='SergiosTwo'
			WHERE AccountID='AccountID' AND Username='$Username;'";
	
	
	if ($conn->query($sql) === TRUE) {
    echo'
	     <div class="login-page">
		 <div class="form">
		 <font color=red>Password Changed</font> <br><br>
		 <a href="MembersAreaUI.html"><button input type="Submit" value="">Homepage</button>
		 </form>
		 </div>
		 </div> ';
} 
else {
	// Error Message
    echo "Error!" . $conn->error;
}
$conn->close();
?>
</body>
</html>