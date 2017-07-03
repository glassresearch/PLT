<!DOCTYPE>
<html>
 <head>
	<meta charset="UTF-8">
	<title>Forms</title>
</head>
<body>
        <marquee><h2>WELCOME.....!!!</h2></marquee>
	<h3>Register Yourself.....!!!</h2>
 	<form action="insert1.php" method = "post">
        <fieldset>
 	<legend>Registration Form</legend>
	BB No. :<input type="text" name="bb_no" id="bb_no"></br></br>

	Name :  <input type="text" name="name" id="name"></br></br>

	Email:  <input type="text" name="email" id="email"></br></br>

	Team:  <input type="text" name="team" id="team"></br></br>

	Manager ID:  <input type="text" name="m_id" id="m_id"></br></br>

 	<input name = "Register" type="submit" value="Register" id 
                  ="Register">
	
      

	</fieldset>	
   </form>
</html>
<?php
$servername = "localhost";
$dbname = "arpi_database";
$username = "root";
$password = "";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();
}

  $bb_no = $_POST['bb_no']; 
  $name = $_POST['name']; 
  $email = $_POST['email']; 
  $team = $_POST['team']; 
  $m_id= $_POST['m_id']; 
  $status ="";
  $query= "SELECT * FROM employee_dit WHERE BB_No = '$bb_no'";
  $result = mysqli_query($con, $query);
  if(mysqli_num_rows($result))
 {
    echo "BB No. exists already";
    exit();
 }
 else
 {
	if (empty($_POST["name"])) {
	$nameErr = "BB# is required";} 
	else {
            if(strlen($bb_no)>6)
            {
             echo "Invalid BB Number";
   	        $status= "NOTOK";
            }
          }
	if (empty($_POST["name"])) {
	    $nameErr = "Name is required";} 
     else {
		$name = $_POST["name"];
		// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		echo "Only letters and white space allowed"; 
		$status= "NOTOK";
		}
          }
     if (!stristr($email,"@danskeit.co.in"))
      {
 		echo "Your email address is not correct <BR>"; 
		$status= "NOTOK";
      } 
     if(strlen($m_id)>6)
      {
         echo "Manager ID is not correct";
   	    $status= "NOTOK";
      }
     if($status !="NOTOK") {
		$query = "INSERT INTO employee_dit(BB_No, Name, 
                    Email, Team, M_ID) VALUES ('$bb_no', 
                    '$name', '$email', '$team', '$m_id')";

		if(mysqli_query($con, $query))
		{
       		      echo $name . "'Record has been added"; 
		}
        }
  }
mysqli_close($con);

?>


