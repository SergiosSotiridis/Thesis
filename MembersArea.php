<html>
<?php

session_start();

//Variables
$Username=$_POST["Username"];
$Password=$_POST["Password"];
$AccountID=$_SESSION['AccountID'] ;
$Email= $_SESSION['Email'];
$Name= $_SESSION['Name'];
$Surname= $_SESSION['Surname'];
$DoB=$_SESSION['DoB'];
$HomeAddress= $_SESSION['HomeAddress'];
$PostalCode=$_SESSION['PostalCode'];
$SubscriptionLevel=$_SESSION['SubscriptionLevel'];
$MaxBuildings=$_SESSION['MaxBuildings'];


//DB Connection
$servername = "localhost"; //DB SERVER IP OR DOMAIN
$dbusername = "root"; //DB USER ACCESS USERNAME
$dbpassword = ""; //DB USER ACCESS PASSWORD
$database = "SergiosSeniorProject";


$conn = new mysqli($servername, $dbusername, $dbpassword, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




//Getting data from bd
$sql = "SELECT * FROM accounts WHERE Username='$Username' and Password='$Password'";

//$result = $conn->query($sql);
 
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));



$count = mysqli_num_rows($result);








// If Condition on num_rows

     if ($count == 1){

        $row = mysqli_fetch_array($result);

            session_start();
            // Saving to Session s
            $_SESSION['AccountID'] = $row['AccountID'];
            $_SESSION['Username'] = $row['Username'];
            $_SESSION['Password'] = $row['Password'];
            $_SESSION['Email'] = $row['Email'];
            $_SESSION['Name'] = $row['Name'];
            $_SESSION['Surname'] = $row['Surname'];
            $_SESSION['DoB'] = $row['DoB'];
            $_SESSION['HomeAddress'] = $row['HomeAddress'];
            $_SESSION['PostalCode'] = $row['PostalCode'];
            $_SESSION['SubscriptionLevel'] = $row['SubscriptionLevel'];
            $_SESSION['MaxBuildings'] = $row['MaxBuildings'];




           
            header("Location: MembersAreaUI.html");
        } else {
            header("Location: InvalidCredentials.php");
        }
     








?>
</html>