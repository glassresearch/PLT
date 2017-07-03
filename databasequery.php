<html>
<body>
<?php
$servername = "localhost";
$dbname = "arpi_database";
$username = "root";
$password = "";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysql_select_db($dbname) or die ("no database found");
if(isset($_POST['submit']))
{
 $name = $_POST['name'];
 $password = $_POST['password'];

 $query = "insert into login(Username,Password)   
  values('$name','$password');

  if(mysql_query($query)
  {
    echo "<h3>Employee data inserted successfully</h3>";
  }
 }   
?>
