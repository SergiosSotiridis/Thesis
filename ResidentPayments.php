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
$ResidentID=$_GET['ResidentID'];



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 




    
         

//////////////
?>
<table align='center'>
<tr><td>
<ul>
<li><a href="MembersAreaUI.html"><img src="Photo/home-symbol.png" height='30px' width="30px">   Home</a></li>
<li><a href="MyAppartements.php"><img src="Photo/back.png" height='30px' width="30px">   Back</a></li>
</ul>
</td></tr></table>  

<table frame="box" id="BuildingTable" cellspacing="15px" align="center" >
                <thead>
                    <tr>
                        <th>Amount Paid</th>
                        <th>Month</th>
                        <th>Date Paid</th>
                        </tr>
                </thead>
                <tbody>

                    <?php
                    //Getting data from table expensespaid.
                    $sql = "SELECT * FROM expensespaid WHERE ResidentID='$ResidentID'";
                    $res = mysqli_query($conn, $sql);
                    if ($resultCheck = mysqli_num_rows($res)) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            
                            $_SESSION['ResidentID'] = $row['ResidentID'];
                            $_SESSION['ReceiptID'] = $row['ReceiptID'];
                            //Showing results in a table.
                            echo "<tr>";
                            echo "<td>€ {$row["Amount"]}</td>";
                            echo "<td>{$row["MonthPaid"]}</td>";
                            echo "<td>{$row["DatePaid"]}</td>";
                            echo '<td><a href="PrintReceiptForm.php?ResidentIDD=' . $row['ResidentID'] . '& ResidentPaymentID=' . $row['ReceiptID'] . '">&nbsp&nbsp<img src="Photo/printer.png" height=20px width="20px"><br>Print</a></td>';
                            echo '<td><a href="EditExpensePaidForm.php?ResidentPaymentID=' . $row['ReceiptID'] . '">&nbsp<img src="Photo/edit.png" height=20px width="20px"><br>Edit</a></td>';
                            echo '<td><a href="DeleteResidentExpenses.php?ResidentPaymentID=' . $row['ReceiptID'] . '">&nbsp&nbsp<img src="Photo/delete.png" height=20px width="20px"><br>Delete</a></td>';
              
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