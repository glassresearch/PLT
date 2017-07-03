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

mysqli_select_db($con ,$dbname) or die ("no database found");

$name= $_POST['name']; 
$passwrd= $_POST['passwrd']; 

$query= "INSERT INTO employee_login(Username, Password)   VALUES ('$name', '$passwrd')";

if(mysqli_query($con, $query))
{
  echo $name . "'s data has been added"; }
else {
 echo "bad" ; }

mysqli_close($con);


?>



