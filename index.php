<html>
<head>
    <title>Calculator</title>
  
    <style type="text/css">
    #main
    {
      width: 100%;
      height: auto;
    }
    #main #cal
    {
      width: 400px;
       height: 300px;
      margin-top:50px;
     } 
    span
    {
       font-weight: bold;
       margin-left: 100px;
     }
    input
    {
       padding-left:50px;
     }
    button
     {
       margin-top:25px;
       margin-left:120px;
      }
     h3
     {
      color:black;
      }
   </style>
 </head>
<body>
<div id="main">
    <div id="cal" class ="container">
       <form action ="cal_submit.php" method ="POST">
          <h3 class="center-align">Calculator</h3>
          <span>Amount:</span><input type="text" name="amount" placeholder="Amount">
          <span>Rate:</span><input type="text" name="rate" placeholder="Rate">
          <span>Time:</span><input type="text" name="time" placeholder="Time">
          <button class ="btn btn-warning">Submit</button><button class="btn btn-warning">Clear</button>
         <br>
          <label for="result" name="result" value="<?php echo $int ?>"></label>
        </form>
    </div>
</div>
</body>


<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "test";
$con = mysqli_connect($host, $user, $password, $dbname);
if(!$con)
{
die("Connection failed:" . mysqli_connect_error());
}
else
{
$sql = "SELECT * FROM interest_calculator";
$res = $con->query($sql);
if($res->num_rows>0)
 {
   echo "<p><b>Previous Calculated Values</b></p>";
  echo "<table border='1'>
<tr>
<th>Amount</th>
<th>Rate of Interest</th>
<th>Time</th>
<th>Interest</th>
</tr>";
while($row=$res->fetch_assoc())
{
echo"<tr>";
echo"<td>".$row['amount']."</td>";
echo"<td>".$row['rate']."</td>";
echo"<td>".$row['time']."</td>";
echo"<td>".$row['interest']."</td>";
echo "</tr>";
}
echo "</table>";
}
else
{
echo "0 results";
}
$con->close();
}
?>
</html>