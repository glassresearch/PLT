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
	showAnim: 'slideDown',
		numberOfMonths:1,
		minDate: '-3M',
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
	    changeYear: true,
	    duration:"slow",
		onClose: function( selectedDate ) {
			$('#date2').datepicker("option","minDate",selectedDate);
		}
    });	 
  }
);
$( function() {
    $( "#date2" ).datepicker({
		showAnim:'slideDown',
		numberOfMonths:1,
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
	    changeYear: true,
	    duration:"slow",
		onClose: function( selectedDate ) {
			$('#date1').datepicker("option","maxDate",selectedDate);
	    }		
	});
	});

  </script>
</head>
<body>
 
        <marquee><h2>Enter your leave details.....!!!</h2></marquee>
 	<form action="test.php" method = "post">

 
 Leave Type	<select name="type">
			<option value=""> </option>
            <option value="sick">Sick</option>
			<option value="privilege">Privilege</option>
			value="<?php echo isset($_POST['type']) ? $_POST['type'] : '' ?>"
  
			</select>
Hours	<input type="text" name="hours" id="hours" value="<?php echo isset($_POST['hours']) ? $_POST['hours'] : '' ?>"></p>			
<p>BB No.: <input type="text" name="username1" id="username1" value="<?php echo isset($_POST['username1']) ? $_POST['username1'] : '' ?>"></p>			
 <p>Start Date: <input type="text" id="date1" name="date1" value="<?php echo isset($_POST['date1']) ? $_POST['date1'] : '' ?>"></p>			
 <p>End Date: <input type="text" id="date2" name="date2" value="<?php echo isset($_POST['date2']) ? $_POST['date2'] : '' ?>"></p>			
 Remarks <input type="text" name="remarks" id="remarks" value="<?php echo isset($_POST['remarks']) ? $_POST['remarks'] : '' ?>"> </p>
 	<input name = "Submit" type="submit" value="Submit" id ="Submit">
	<input name = "Logout" type="submit" value="Logout" id ="Logout" formaction="login.php">

</form>
 
 
</body>
</html>


<?php
//session_start();
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

if(isset($_POST["Submit"]))  {

$type= $_POST['type']; 
$bb_no = $_POST['username1'];
$date1= date_create($_POST['date1']); 
$hours=$_POST['hours']; 
$date2= date_create($_POST['date2']); 

$remarks= $_POST['remarks']; 

$diff=date_diff($date1,$date2);
$days=$diff->format("%a");
$day =  $date1->format("w");

$date1= date_format($date1,'Y-m-d');
$date2= date_format($date2,'Y-m-d');


	if (empty($_POST["type"])) {
	  echo  "Please enter your leave type <br>";
	  $status ="NOTOK"; } 
	if(strlen($days)>3)
            {
             echo "Invalid Duration. <br>";
   	         $status= "NOTOK";
            }
	if (empty($_POST["date1"])) {
	echo "Start Date is required. <br>";
	$status ="NOTOK";}
	else
	  if($date1 >date("Y-m-d")) {echo "Correct Start Date. <br>"; 
	  $status ="NOTOK";} 
	if (empty($_POST["date2"])) {
	echo "End Date is required. <br>";
	$status ="NOTOK";}
	else
	  if($date2 >date("Y-m-d")) {echo "Future date is not acceptable <br>"; 
	  $status ="NOTOK";}   
	if(empty($_POST["hours"])) {
	echo "Hours is required. <br>";
	$status ="NOTOK";}  

if($hours==4)
{
   $hours1=$hours;
}
else {
	
   if($hours%8===0)
   {
	   $hours1=8;
   }	
   else {
	   echo "Hours is not correct <br>";
	   $status ="NOTOK";}
}		
if($status !="NOTOK")
{
while($days >=0)
			{
			   if($day == 6 || $day == 0)
			   {
				  
			   }
			   else {
				   
				   $query = "INSERT INTO leave_data(BB_No, Type, 
                    Start_Date, End_Date, Hours, Remarks) VALUES ('$bb_no',
                    '$type', '$date1', '$date1', '$hours1','$remarks')";
					mysqli_query($con, $query);
					
					
					   
			   } 
			   $date1=date('Y-m-d', strtotime($date1. ' + 1 days'));
			   $date1= date_create($date1);
			   $day =  $date1->format("w");
			   
			   $days=$days-1;
			   $date1= date_format($date1,'Y-m-d'); 
			   
			} 
			
       		      echo  "Leave has been recorded"; 
		     

   
 
  } 
}

mysqli_close($con);


?>


