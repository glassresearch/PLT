<?php
header("Content-Type: application/json; charset=UTF-8");
session_start();
$servername = "localhost";
$dbname = "arpi_database";
$username = "root";
$password = "";
$status ="";


$obj = json_decode($_GET["x"], false);


// Create connection
$con = mysqli_connect($servername ,$username ,$password ,$dbname );

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$result = $con->query("SELECT BB_No,Type,Start_Date,End_Date,SUM(Hours) AS LEAVE_HOURS FROM leave_data WHERE Start_Date >= '$obj->sdate' 
                      AND End_Date <='$obj->edate' GROUP BY BB_No, Type");


$outp = array();


$outp = $result->fetch_all(MYSQLI_ASSOC);


echo json_encode($outp);


mysqli_close($con);


?>





