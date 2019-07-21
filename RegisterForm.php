<html>
<head>
<link rel="stylesheet" type="text/css" href="LoginFormCSS.css">

<script>
	// Checking if Password field is empty
	function checkform()
    {
    	

     if (document.getElementById("Password").value == "")
    {
        
        alert("Password Cannot Be Blank!");
        document.getElementById("Password").style.borderColor="red";
        return false;
    }

   	return true;
    }
</script>

</head>
<body>
<link rel="stylesheet" type="text/css" href="Senior Project.css">
<link href="https://fonts.googleapis.com/css?family=Heebo" rel="stylesheet">

<div class="login-page">
   <div class="form">
    <form class="login-form" action="RegistrationConfirm.php"  onSubmit="return checkform()" method="post">
      <input type="text" id ="Username" name="Username" placeholder="Username" required/>
      <input type="password" id="Password" name="Password" placeholder="Password"/>
	  <input type="text" name="Name" placeholder="Your First Name"/>
	  <input type="text" name="Surname" placeholder="Your Surname"/>
	  <input type="text" name="Email" placeholder="Your Email"/>
	  <input type="date" name="DoB" placeholder="Date of Birth YYYY/MM/DD"/>
	  <input type="text" name="HomeAddress" placeholder="Your Home Address"/>
      <input type="text" name="PostalCode" placeholder="Your Postal Code"/>
      <table>
        
	  <tr><td width='200px'><ul><input type="radio" name="SubscriptionLevel" value="1" checked>Starter Version (Free)<br>1 Building</ul></td></tr><br>
	  <tr><td width='200px'><ul><input type="radio" name="SubscriptionLevel" value="2">Intermediate Version <br>3 Buildings<br>€14.99/Month</ul></td></tr><br>
	  <tr><td width='200px'><ul><input type="radio" name="SubscriptionLevel" value="3">Professional Version<br>Unlimited<br>€29.99/Month</ul></td></tr>

 </table>
      <button input type="submit" value="Login">Register</button>	  
	  <p class="message"><a href="Login Form.php">Already Registered?</a></p>
    </form>
  </div>
</div> 





</body>
</html>