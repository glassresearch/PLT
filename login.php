<!DOCTYPE html>
<html>
 <head>
	<meta charset="UTF-8">
	<title>Forms</title>
	<script type="text/javascript">
  function submitForm(action) {
    var regform = document.getElementById('form1');
    regform.action = action;
    regform.submit();
  }
</script>
</head>
<body>
        <marquee><h2>WELCOME.....!!!</h2></marquee>
	
 	<input type="text" name="name" id="name">
	<input type="Password" name="passwrd" id="passwrd"> </p>
	<form id="form1">
  <!-- ... -->
  <input type="button" onclick="submitForm('login.php')" value="Submit" />
  <input type="button" onclick="submitForm('register.php')" value="Register" />
</form>
</body>
</html>


<?php
$servername = "localhost";
$dbname = "arpi_database";
$username = "root";
$password = "";


// Create connection
$con = mysqli_connect($servername ,$username ,$password ,$dbname );

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_GET["submit"])) {
$bb_no= $_POST['name']; 
$passwrd= $_POST['passwrd']; 

$query1 = "SELECT * FROM employee_login where Username = '$bb_no'";
$query2 = "SELECT * FROM employee_login where Username = '$bb_no' AND  Password ='$passwrd'";


$result1 = mysqli_query($con, $query1);
$values1 = mysqli_num_rows($result1);
$result2 = mysqli_query($con, $query2);
$values2 = mysqli_num_rows($result2);




if (mysqli_num_rows($result1))
 {
   if (mysqli_num_rows($result2))
    {
    echo "Login Successful";
    }
   else
     echo "Username & Password does not match";
 }
else
 echo "You have not registered";
 
}

mysqli_close($con);


?>







	    

	


