<!DOCTYPE>
<html>
 <head>
	<meta charset="UTF-8">
	<title>Forms</title>
</head>
<body>
        <marquee><h2>WELCOME.....!!!</h2></marquee>
	<h3>Register Yourself.....!!!</h2>
 	<form action="register.php" method = "post">
        <fieldset>
 	<legend>Registration Form</legend>
	BB No. :<input type="text" name="bb_no" id="bb_no"></br></br>

	Password:<input type="Password" name="passwrd" 
	id="passwrd"></br></br>

	Confirm Password:<input type="Password" name="c_password" 
	id="c_password"></br></br>


	Name :  <input type="text" name="name" id="name"></br></br>

	Email:  <input type="text" name="email" id="email"></br></br>

	Team:  <input type="text" name="team" id="team"></br></br>

	Banking Area:  <input type="text" name ="b_domain" id="b_domain"></br></br>

	Department:  <input type="text" name ="dept" id="dept"></br></br>



	Manager ID:  <input type="text" name="m_id" id="m_id"></br></br>

 	<input name = "Register" type="submit" value="Register" id ="Register">
	
      

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

if(isset($_POST["Register"])) {
  $bb_no = $_POST['bb_no']; 
  $passwrd = $_POST['passwrd']; 
  $c_password = $_POST['c_password']; 
  $name = $_POST['name']; 
  $email = $_POST['email']; 
  $team = $_POST['team']; 
  $m_id= $_POST['m_id']; 
  $b_domain = $_POST['b_domain']; 
  $dept = $_POST['dept']; 
  $status ="";

  if (empty($_POST["bb_no"])) {
	  echo "BB# is required. </p>";
	  $status ="NOTOK";} 
  else {	  
          $query= "SELECT * FROM employee_dit WHERE BB_No = '$bb_no'";
          $result = mysqli_query($con, $query); 
          if(mysqli_num_rows($result))
		  {
			echo "BB No. exists already ";
			exit();
		  }
		  if (empty($_POST["bb_no"])) {
				echo  "BB# is required. <br>";} 
				else 
					if(strlen($bb_no)>6)
					{
						echo "Invalid BB Number. <br>";
						$status= "NOTOK";
					}
          
				if (empty($_POST["passwrd"])) {
					echo "Password is required. <br>";} 
				else 
					if(strlen($passwrd)>15)
					{
						echo "Password should be maximum 15
						characters.<br>";
						$status= "NOTOK";
					}
          
				if (empty($_POST["c_password"])) {
						echo "Confirm your Password. <br>";} 
				else 
					if(strcmp($passwrd,$c_password))
					{
						echo "Passwords are not matching... <br>";
						$status= "NOTOK";
					}
          
				if (empty($_POST["name"])) {
					echo "Name is required. <br>";} 
				else {
					$name = $_POST["name"];
					// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
					echo "Only letters and white space allowed in 
					Name <br>"; 
					$status= "NOTOK"; }
					}
				if (empty($_POST["email"])) {
					echo "Email is required \n";} 
				else if(!stristr($email,"@danskeit.co.in"))
				{
					echo "Your email address is not correct."; 
					echo "for example: abcd@danskeit.co.in <br>"; 

					$status= "NOTOK";
				} 
				if (empty($_POST["team"])) {
					echo "Team name is empty. <br>";} 
	

				if (empty($_POST["m_id"])) {
					echo "Manager ID required. <br>";} 
				else if(strlen($m_id)>6)
				{
					echo "Manager ID is not correct. <br>";
					$status= "NOTOK";
				}
				if (empty($_POST["b_domain"])) {
					echo "Banking Domain is missing. <br>";
					$status= "NOTOK";	} 

				if (empty($_POST["dept"])) {
					echo "Department is missing. <br>";
					$status= "NOTOK";	} 

	
				if($status !="NOTOK") {
					$query = "INSERT INTO employee_dit(BB_No, Name, 
                    Email, Team, M_ID) VALUES ('$bb_no', 
                    '$name', '$email', '$team', '$m_id')";
					$query1 = "INSERT INTO manager_dit(Manager_BB_No,
                     Services,Department, Team) VALUES ('$m_id', '$b_domain', '$dept', '$team')";
					 $query2 = "INSERT INTO employee_login(Username,
                     Password) VALUES ('$bb_no', '$passwrd')";

				if((mysqli_query($con, $query)) AND 
				   (mysqli_query($con, $query2)))
				{
					echo $name . "'Record has been added"; 
				}
             }
    } 
  }
mysqli_close($con);

?>




