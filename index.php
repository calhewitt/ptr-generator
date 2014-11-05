<?php
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: login");
}
?>
<!DOCTYPE html>
<title>LUCID PTR generator</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>

<!--Date Picker-->
<link rel="stylesheet" href="pickadate/lib/themes/default.css" id="theme_base">
<link rel="stylesheet" href="pickadate/lib/themes/default.date.css" id="theme_date">
<link rel="stylesheet" href="pickadate/lib/themes/default.time.css" id="theme_time">
<script src = "pickadate/lib/picker.js"></script>
<script src = "pickadate/lib/picker.date.js"></script>
<script src = "pickadate/lib/picker.time.js"></script>

<style>
* {
font-family: Open Sans;
font-weight: 300;
font-size: 17px;
}
input, textarea {
width: 765px;
padding-right: 15px;
height: 50px;
padding-left: 15px;
background-color: #dddddd;
border: none;
margin-top: 5px;
}
input[type="button"] {
width: 100px;
align: right;
margin-left: 690px;
margin-top: 20px;
background-color: #259b24;
color: white;
}
select {
width: 100px;
height: 40px;
border: none;
background-color: #dddddd;
}
.small {
width: 50px;
}
#header {
width: 100%;
height: 90px;
background-color: #dddddd;
position: absolute;
top: 0;
left: 0;
text-align: center;
font-size: 60px;
font-family: Open Sans;
font-weight: 300;
padding-top: 30px;
color: #333333;
border-top: 3px solid #333333;
}
body {
padding-top: 130px;
}
#details {
position: absolute;
top: 90px;
right: 10px;
font-weight: 300;
}
#details a {
color: #333333;
text-decoration: none;
}
#container {
    width: 800px;
    margin: 20px auto;
}
select {
margin-top: 5px;
}
</style>
<div id = "header">
<img src="lucid.jpg" width="60" style="border-radius: 3px; position: relative; top: 6px;">
PTR GENERATOR
</div>
<div id = "details">
<?php print $_SESSION['username']; ?> (<a href = "login/?action=logout">log out</a>)
</div>
<div id = "container">

<div id = "select-number-captures">

Input the start date of the slot: <input type = "text" id = "date">
<br><br>
Input the number of captures to take:
<input type = "number" value = "8" min = "1" id = "number-captures"><br>
<input type = "button" value = "Ok" id = "captures-ok">
</div>
<br>
<div id = "select-config-files" style = "display:none;">
<div></div>
<input type = "button" value = "Ok" id = "config-ok">
</div>
</div>

</div>

<script>

var $input = $('#date').pickadate()
var date = $input.pickadate('picker')

$("#captures-ok").click(function() {
	$("#select-number-captures").fadeTo("fast", 0.5, function() {
		$("#select-number-captures input").attr("disabled", "true");
	});
	var number_captures = $("#number-captures").val();

	filename_dropdown = "<select class = 'config-filename'> \
	<option value = '311'>311</option> \
	<option value = '312'>312</option> \
	<option value = '313'>313</option> \
	<option value = '314'>314</option> \
	<option value = '315'>315</option> \
	<option value = '316'>316</option> \
	<option value = '317'>317</option> \
	<option value = '318'>318</option> \
	</select><br>";

	for (i = 0; i < number_captures; i++) {
	    $("#select-config-files div").append("Configuration filename for capture " + (i+1) + ": " + filename_dropdown);
	}

	$("#select-config-files").fadeIn();
	$("html, body").animate({ scrollTop: $(document).height() }, 1200);
});

$("#config-ok").click(function() {
	$("#select-config-files").fadeTo("fast", 0.5, function() {
		$("#select-number-captures input,select").attr("disabled", "true");

		var configs = "";

		$("#select-config-files select").each(function() {
			configs += $(this).val() + ",";
		});
	
		configs = configs.slice(0,-1);

		//generate UNIX timestamp for start date/time
		
		var fdate = date.get("select", "dd-mm-yyyy");

		window.location = "generate.php?configs=" + configs + "&start=" + fdate;
	});
});

</script>
