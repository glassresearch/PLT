<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
form
{
    align:"center";
}
</style>
</head>
<body>  

<?php
$servername = "localhost";
$dbname = "arpi_database";
$username = "root";
$password = "";
$nameErr ="";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
exit();}
// define variables and set to empty values
$bbErr = $nameErr = $emailErr = $passwrdErr = $c_passwrdErr = $teamErr = $bankingErr = $departErr = $managerErr = "";
$bb_no = $passwrd = $c_passwrd = $name = $email = $team =$banking = $department = $manager = $status ="";


if(isset($_POST["submit"])) {
  if (empty($_POST["bb_no"])) {
    $bbErr = "BB# is required";
  } else {
	$bb_no = $_POST['bb_no'];  
	$query= "SELECT * FROM employee_dit WHERE BB_No = '$bb_no'";
          $result = mysqli_query($con, $query); 
          if(mysqli_num_rows($result))
		  {
			$bbErr = "BB No. exists already";
			$status= "NOTOK";
		  }
          else {
				$bb_no = $_POST['bb_no'];
				if(strlen($bb_no)>6)
					{
						$bbErr = "Invalid BB Number.";
						$status= "NOTOK";
					}		
			   }
  }	
  if (empty($_POST["passwrd"])) {
  $passwrdErr = "Password is required ";
  $status= "NOTOK";}
  else {
	    $passwrd = $_POST['passwrd'];
		if(strlen($passwrd)>15)
		{
			$passwrdErr ="Password should be maximum 15 characters.";
			$status= "NOTOK";
						
		}
	  }
  if (empty($_POST["c_passwrd"])) {
    $c_passwrdErr = "Confirm your Password";
	$status= "NOTOK";;
  } 
  else {
	 $c_passwrd = $_POST['c_passwrd'];
	 if(strcmp($passwrd,$c_passwrd))
					{
						$c_passwrdErr = "Passwords are not matching... ";
						$status= "NOTOK";
					} 
       }
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	$status= "NOTOK";
  } else {
	$name = $_POST['name'];
	if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
		$nameErr = "Only letters and white space allowed in Name.";  
		$status= "NOTOK";}
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
	$status= "NOTOK";
  } else {
	$email = $_POST['email'];  
	if(!stristr($email,"@danskeit.co.in"))
				{
					$emailErr = "Your email address is not correct."; 
					$emailErr = "for example: abcd@danskeit.co.in "; 
					$status= "NOTOK";
				}   
  }
    
    if (empty($_POST["team"])) {
    $teamErr = "Team name is required";
	$status= "NOTOK";
  } else {
    $team = $_POST['team'];
  }
  
  if (empty($_POST["banking"])) {
    $bankingErr = "Banking is required";
	$status= "NOTOK";
  } else {
    $banking = $_POST['banking'];
  }
  
  if (empty($_POST["department"])) {
    $departErr = "Department is required";
	$status= "NOTOK";
  } else {
    $department = $_POST['department'];
  }
  
  if (empty($_POST["manager"])) {
    $managerErr = "Manager name is required";
	$status= "NOTOK";
  } else {
    $manager = $_POST['manager'];
	if(strlen($manager)>6)
	{
	  $managerErr = "Manager ID is not correct. ";
	  $status= "NOTOK";
					
	}
  }
  if($status !="NOTOK") {
					$query = "INSERT INTO employee_dit(BB_No, Name, 
                    Email, Team, M_ID) VALUES ('$bb_no', 
                    '$name', '$email', '$team', '$manager')";
					
					$query1 = "INSERT INTO employee_login(Username, Password) VALUES ('$bb_no', 
                    '$passwrd')";
					$query2 = "INSERT INTO manager_dit(Manager_BB_No,
                     Services,Department, Team) VALUES ('$manager', '$banking', '$department', '$team')";
					 

				if((mysqli_query($con, $query2)) AND 
					(mysqli_query($con, $query)) AND
				   (mysqli_query($con, $query1)))
				{
					
					header ("Location: http://localhost/PLT%20System/PLT/Registration_success.html"); 
					exit;
				}
			}
}



?>

<h2>Employee Registration</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  BB No.: <input type="text" name="bb_no" value="<?php echo isset($_POST['bb_no']) ? $_POST['bb_no'] : '' ?>">
  <span class="error"> <?php echo $bbErr;?></span>
  <br><br> 
  Password: <input type="Password" name="passwrd" value="<?php echo isset($_POST['passwrd']) ? $_POST['passwrd'] : '' ?>">
  <span class="error"> <?php echo $passwrdErr;?></span>
  <br><br>
  Confirm Password: <input type="Password" name="c_passwrd" value="<?php echo isset($_POST['c_passwrd']) ? $_POST['c_passwrd'] : '' ?>">
  <span class="error"> <?php echo $c_passwrdErr;?></span>
  <br><br>
  Name: <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  Team: <input type="text" name="team" value="<?php echo isset($_POST['team']) ? $_POST['team'] : '' ?>">
  <span class="error"> <?php echo $teamErr;?></span>
  <br><br>
  Banking Area: <input type="text" name="banking" value="<?php echo isset($_POST['banking']) ? $_POST['banking'] : '' ?>">
  <span class="error"> <?php echo $bankingErr;?></span>
  <br><br>
  Department: <input type="text" name="department" value="<?php echo isset($_POST['department']) ? $_POST['department'] : '' ?>">
  <span class="error"> <?php echo $departErr;?></span>
  <br><br>
  Manager BB#: <input type="text" name="manager" value="<?php echo isset($_POST['manager']) ? $_POST['manager'] : '' ?>">
  <span class="error"> <?php echo $managerErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit"> 
  <input type="submit" name="Cancel" value="Cancel" formaction="login.php">
</form>





</body>
</html>