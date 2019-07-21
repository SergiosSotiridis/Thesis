<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<title>Homepage</title>
</head>
<?php
session_start();

// Checking Sessions
if (isset($_SESSION['Username'])){
$Username = $_SESSION['Username'];
echo '
<div class="login-page">
   <div class="form">
    <form class="login-form" action="MembersAreaUI.HTML" method="post">
	  <font color=red>You are Already Logged In</font> <br><br>
      <button input type="Submit" value="Members Area">Members Area</button>
	</form>
	<form  class="login-form" action="Logout.php" method="post">
      <button input type="Submit" value="Log Out" >Log Out</button>
    </form>
  </div>
</div> ';
}

else
	
	{

// Login Form
echo 
' 

<div class="login-page">
   <div class="form">
    <form class="login-form" action="MembersArea.php" method="post">
      <input type="text" name="Username" placeholder="Username"/>
      <input type="password" name="Password" placeholder="Password"/>
      <button input type="submit" value="Login">Login</button>
      <p class="message">Not registered? <a href="RegisterForm.php">Create an account</a></p>
    </form>
  </div>
</div> ';

	}
	

?>
 
</html>



