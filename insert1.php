<!DOCTYPE html>
<html>
 <head>
	<meta charset="UTF-8">
	<title>Forms</title>
</head>
<body>
        <marquee><h2>WELCOME.....!!!</h2></marquee>
 	<form action="insert1.php" method = "post">
        <fieldset>
 	<legend>Action Attribute</legend>
	<input type="text" name="name" id="name">
	<input type="text" name="passwrd" id="passwrd">
 	<input name = "Submit" id ="Submit" type="submit" 
       value="Submit" >
	<input name = "Register" id ="Register" type="submit" 
       value="Register" >

   </form>
</body>
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
if($_POST)
{ 
  if(isset($_POST['Submit']))
  { 
    // process update 
    $name= $_POST['name']; 
  $passwrd= $_POST['passwrd']; 

  $query= "INSERT INTO employee_login(Username, Password)   
           VALUES ('$name', '$passwrd')";

  if(mysqli_query($con, $query))
  {
    echo $name . "'s data has been added"; }
  else {
    echo "bad" ; }

  mysqli_close($con);

  } 
else if(isset($_POST['Register'])) { 

 echo	"<html>";
echo "<head>";
echo '<meta charset="UTF-8">';
echo "<title>Forms</title>";
echo "</head>";
echo "<body>";
echo "<h3>Register Yourself.....!!!</h2>";
echo '<form action="insert1.php" method = "post">';
echo "<fieldset>";
echo "<legend>Registration Form</legend>";
echo 'BB No. :<input type="text" name="bb_no" id="bb_no"></br>';
echo "</br>";

echo 'Name :  <input type="text" name="name" id="name"></br>';
echo "</br>";
echo 'Email:  <input type="text" name="email" id="email"></br>';
echo "</br>";

echo 'Team:  <input type="text" name="team" id="team"></br>';
echo "</br>";

echo 'Manager ID:  <input type="text" name="m_id" id="m_id">';
echo "</br></br>";

echo '<input name = "Register" type="submit" value="Register"'; echo "id"; 
echo '="Register">';
	
      

echo "</fieldset>";	
echo "</form>";
echo "</html>";
 	
} 

}


  
?>


	    

	


