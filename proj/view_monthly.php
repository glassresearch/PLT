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



$result = $con->query("SELECT Type,Start_Date,End_Date,SUM(Hours) AS TOTAL FROM leave_data WHERE Start_Date >= '$obj->sdate' 
                      AND End_Date <='$obj->edate' GROUP BY Start_Date, Type");
					  

if($result->num_rows>0)
{
	while($row = $result->fetch_assoc()) {
            $curr_date=$row["Start_Date"];
			$date1=date_create($row["Start_Date"]);
			$date2=date_create($row["End_Date"]);
			$diff=date_diff($date1,$date2);
			$days=$diff->format("%a");
			
			while($days >=0)
			{
			   
				   echo json_encode(" Type: " . $row["Type"]. " Start_Date : " . $curr_date. " End_Date : " . $curr_date. " Leave Hours : " . $row["TOTAL"]);
			   $curr_date=date('Y-m-d', strtotime($row["Start_Date"]. ' + 1 days'));
			   $days=$days-1;   
			   
			}
 }
} 
$outp = array();


$outp = $result->fetch_all(MYSQLI_ASSOC);


echo json_encode($outp);




mysqli_close($con);


?>




