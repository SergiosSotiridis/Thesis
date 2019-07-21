<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">
<style>
body {
  background-color: seashell;
}
</style>
</head>
<body>
<link rel="stylesheet" type="text/css" href="Senior Project.css">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">

<div class="login-page">
   <div class="form">
    <form class="login-form" action="RegistrationConfirm.php" method="post">
	  <font color=red>Invalid Credentials</font> <br><br>
      <input type="text" name="Username" placeholder="Username"/>
      <input type="password" name="Password" placeholder="Password"/>
	  <input type="text name="Name" placeholder="Your First Name"/>
	  <input type="text" name="Surname" placeholder="Your Surname"/>
	  <input type="text" name="Email" placeholder="Your Email"/>
	  <input type="text" name="DoB" placeholder="Your Date of Birth"/>
	  <input type="text" name="HomeAddress" placeholder="Your Home Address"/>
      <input type="text" name="Postal Code" placeholder="Your Postal Code"/>
      <button input type="submit" value="Login">Register</button>	  
	  <p class="message"><a href="Login Form.php">Already Registered?</a></p>
    </form>
  </div>
</div> 


<form  action="MembersArea.php" method="post">
<table  align="Center" cellspacing=40px>  
<tr>
<td>
  <td class="table2" width=200px> &nbsp &nbsp &nbsp &nbsp  <input type="radio" name="SubscriptionLevel" value="1" checked>Free Version<br> &nbsp &nbsp &nbsp Limited to 1 Building<br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Reminders<br> &nbsp &nbsp &nbsp &nbsp Calendar Planning</td>
  <td class="table2" width=200px> &nbsp &nbsp  <input type="radio" name="SubscriptionLevel" value="2">Intermidiate Version<br> &nbsp &nbsp &nbsp Limited to 3 Building<br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Reminders<br> &nbsp &nbsp &nbsp &nbsp Calendar Planning<br></td>
  <td class="table2" width=200px> &nbsp &nbsp &nbsp  <input type="radio" name="SubscriptionLevel" value="3">Business Version<br> &nbsp &nbsp &nbsp Unlimited Buildings<br> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Reminders<br> &nbsp &nbsp &nbsp &nbsp Calendar Planning</td>

</td>
</tr>
</table>

</form>
 

</body>
</html>