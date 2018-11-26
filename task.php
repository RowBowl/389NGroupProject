<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" href="./css/main.css">
</head>
<body>
	<div class="container">

		<h1>Task Edit</h1> <!-- This title doesn't sound right. Feel free to change it to something more descriptive. -->
		<h2 id = "today"></h2>
		
		<hr>
		
		<form method = "post">
		<div class = "form-group">
			<label for = "text">Task:</label>
			<input type = "text" class = "form-control">
		</div>
		
		<div class = "form-group">
			<label for = "text">Details:</label>
			<textarea rows = "4" class = "form-control"></textarea>
		</div>
		
		<div class = "form-group">
			<label for = "text">Deadline:</label>
			<input type = "date" class = "form-control">
		</div>
		
		<br>
		<button type = "submit" class = "btn btn-default">Submit</button> &nbsp;
		<button type = "button" class = "btn btn-default">Cancel</button>
		</form>
		
	</div>

	<script src="bootstrap/jquery-3.2.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script>
		initialize();
		
		function initialize() {
			var d = new Date();
			var str = d.toDateString();
			document.getElementById("today").innerHTML = str;
		}
	</script>
</body>
</html>
