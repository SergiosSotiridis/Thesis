<html>
<head>
<title>Receipt</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="ReceiptCSS.css">
<style>
body{
 background-image: url("Photo/Blur.jpg");
 background-size: cover;
 background-repeat: no-repeat;
}


button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-left: 1100px;


  font-size: 16px;
}

table {
	
	margin-top: 200px;
	margin-bottom: 200px;
	margin-left: 500px;
	margin-right: 500px;
	border-spacing: 15px;
    border: 1px solid black;
	background-color: silver;
	font-size: 18px;
}
</style>

<script>
function myFunction() {
  window.print();
}
</script>
</head>

<body>
<?php
// Varibales
$Date=$_POST["Date"];
$Period=$_POST["Period"];
$Building=$_POST["Building"];
$Address=$_POST["Address"];
$Flat=$_POST["Flat"];
$PaidBy=$_POST["PaidBy"];
$ReceivedBy=$_POST["ReceivedBy"];
$Amount=$_POST["Amount"];


// Creating Receipt
echo "

<div class='container'>
<table align='center'>
<tr>
<td></td><td><h1>RECEIPT<h1></td><td></td>
</tr>
<tr>
<td>Date: $Date</td><td>Period: $Period</td><td>Building: $Building</td>
</tr>
<tr>
<td>Address: $Address</td><td>Flat No:$Flat</td>
</tr>
<td>Paid By: $PaidBy</td><td>Received By: $ReceivedBy</td>
</tr>
<tr>
<td></td><td></td><td>Amount: <br>$Amount €</td>
</tr>
<tr>
<td>Paid By(Signature)__________________________________</td><td>Received By(Signature)__________________________________</td>
</tr>
</table>
</div>";
?>



<div>
	<button onclick="myFunction()">Print</button>
  <br><br>
	<a href="MembersAreaUI.html"><button id="Homepage">Homepage</button></a>	

</div>





</body>
</html>

