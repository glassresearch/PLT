<!DOCTYPE html>
<html>
 <head>
	<meta charset="UTF-8">
	<title>Forms</title>
	<script type="text/javascript">
  function submitForm(action) {
    var regform = document.getElementById('form1');
    regform.action = action;
	regform.method = "post";
    regform.submit();
  }
</script>
</head>
<body>
        <marquee><h2>WELCOME to PLT.....!!!</h2></marquee>
	
 	
	<form id="form1">
  <!-- ... -->
<input type="text" name="name" id="name">
	<input type="Password" name="passwrd" id="passwrd"> </p>
  <input type="button" onclick="submitForm('login1.php')" value="Submit" />
  <input type="button" onclick="submitForm('register.php')" value="Register" />
</form>
</body>
</html>



