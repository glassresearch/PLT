<!doctype html>
<html lang="en">
<head>
    
  <pre id ="output"> Give me a date </pre>
  <script>
  function make_json(form){
	  var obj, dbParam, xmlhttp;

obj = { "sdate": form.date_1.value,"edate": form.date_2.value};
dbParam = JSON.stringify(obj);
xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		
        document.getElementById("output").innerHTML = this.responseText;
    }
};
xmlhttp.open("GET", "view_monthly.php?x=" +dbParam, true);
xmlhttp.send();
return false;
  }
  </script>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js" type ="text/javascript"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type ="text/javascript">
    $( function() {
	$( "#date_1" ).datepicker({
		showAnim: 'slideDown',
		numberOfMonths:1,
		minDate: '-3M',
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
	    changeYear: true,
	    duration:"slow",
		onClose: function( selectedDate ) {
			$('#date_2').datepicker("option","minDate",selectedDate);
		}
       });
	});
	
	$( function() {
    $( "#date_2" ).datepicker({
		showAnim:'slideDown',
		numberOfMonths:1,
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
	    changeYear: true,
	    duration:"slow",
		onClose: function( selectedDate ) {
			$('#date_1').datepicker("option","maxDate",selectedDate);
	    }		
	});
	});

  </script>
  
</head>
<body>

<form onsubmit="return make_json(this);">
<p>From: <input type="text" id="date_1" /></p>
<p>To: <input type="text" id="date_2"></p>
<input type="submit" value="Submit" />
</form>
 
</body>
</html>

