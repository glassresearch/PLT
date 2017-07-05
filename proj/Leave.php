<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#date1" ).datepicker({
	changeMonth: true,
	changeYear: true,
	duration:"slow"
    });	 
  }
);
  </script>
</head>
<body>
 
        <marquee><h2>Enter your leave details.....!!!</h2></marquee>
 	<form action="Leave.php" method = "post">

 BB No.<input type="text" name="bb_no" id="bb_no"> </p>
 Leave Type	<select name="type">
			<option value="  "> </option>
            <option value="sick">Sick</option>
			<option value="privilege">Privilege</option>
  
			</select>
 <p>Start Date: <input type="text" id="date1" name="date1"></p>			
 Duration <input type="text" name="duration" id="duration">	</p>
 Remarks <input type="text" name="remarks" id="remarks"> </p>
 	<input name = "Submit" type="submit" value="Submit" id ="Submit">


 
 
</body>
</html>


<?php
$servername = "localhost";
$dbname = "arpi_database";
$username = "root";
$password = "";
$status ="";

// Create connection
$con = mysqli_connect($servername ,$username ,$password ,$dbname );

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_POST["bb_no"]) && !empty($_POST["bb_no"])) {
$bb_no= $_POST['bb_no']; }
if(isset($_POST["type"]) && !empty($_POST["type"])) {
$type= $_POST['type']; }
if(isset($_POST["duration"]) && !empty($_POST["duration"])) {
$duration= $_POST['duration']; }
if(isset($_POST["date1"]) && !empty($_POST["date1"])) {
$date1= strtotime($_POST['date1']); }
if(isset($_POST["remarks"]) && !empty($_POST["remarks"])) {
$remarks= $_POST['remarks']; }

    if (empty($_POST["bb_no"])) {
	  echo "BB# is required. <br>";
	  $status ="NOTOK";} 
	else 
            if(strlen($bb_no)>6)
            {
             echo "Invalid BB Number. <br>";
   	        $status ="NOTOK" ;
            }
	if (empty($_POST["type"])) {
	  echo  "Please enter your leave type <br>";
	  $status ="NOTOK"; } 
	if (empty($_POST["duration"])) {
	  echo  "Duration is required. <br>";
	  $status ="NOTOK";} 
	else 
            if(strlen($duration)>3)
            {
             echo "Invalid Duration. <br>";
   	         $status= "NOTOK";
            }
	if (empty($_POST["date1"])) {
	  echo "Start Date is required. <br>";
	  $status ="NOTOK";} 
	
		

		
if($status !="NOTOK") {
    $query = "INSERT INTO leave_data(BB_No, Type, 
                    Start_Date, Duration, Remarks) VALUES ('$bb_no', 
                    '$type', '$date1', '$duration', '$remarks')";



    if(mysqli_query($con, $query)) 
		{
       		      echo  "Leave has been recorded"; 
		}
    
 
}

mysqli_close($con);


?>



