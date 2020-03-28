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
$amount = $_POST["amount"];
$rate = $_POST["rate"];
$time = $_POST["time"];
$int=($amount*$rate*$time)/100;
$sql="INSERT INTO interest_calculator(amount, rate, time, interest) VALUES ($amount, $rate, $time, $int)";
if($con->query($sql) === TRUE)
{
header("Location: http://localhost:8080/programs/");
}
else
{
echo"Error:" . $sql."<br>".$con->error;
}
}
?>