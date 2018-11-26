<?php


if (isset($_POST["submitform"])) {
    $user = $_POST["username"];
	$password = $_POST["password"];

	
}


$body <<< LABEL
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
	<!-- TO DO: add in php code for date and storing tasks in database -->
	<!-- TO DO: add in option to navigate between different months. -->
	<!-- TO DO: add in option to change the month's image. -->
	<div class="container">

		<h1>Goals and Plans</h1>
		<h2 id = "today"></h2>
		<h3>January 2019 Schedule</h3>

		<div class="row">
			<fieldset class="col-lg-6">
				<legend>Goals and Tasks</legend>

				<div class="tasks-to-do" id = "tasks">
					<div class="panel panel-default">
						<div class = "panel-heading">
							<div class = "row">
								<div class = "task-text col-lg-9"><font size = "5">TASK 1</font></div>
								<button type = "button" class = "btn btn-info">...</button>
								<button type = "button" class = "btn btn-danger move-right">X</button>
								<button type = "button" class = "btn btn-success remove">></button>
							</div>
						</div>
						<div class = "panel-body">This is a description of the task. This is a description of the task. This is a description of the task. This is a description of the task.</div>
					</div>

					<div class="panel panel-default">
						<div class = "panel-heading">
							<div class = "row">
								<div class = "task-text col-lg-9"><font size = "5">TASK 2</font></div>
								<button type = "button" class = "btn btn-info">...</button>
								<button type = "button" class = "btn btn-danger move-right">X</button>
								<button type = "button" class = "btn btn-success remove">></button>
							</div>
						</div>
						<div class = "panel-body">This is a description of the task. This is a description of the task. This is a description of the task. This is a description of the task.</div>
					</div>
				</div>

				<button type = "button" class = "btn btn-primary btn-lg btn-block" id = "add-task">+</button>

			</fieldset>

			<fieldset class="col-lg-6">
				<legend>Completed Tasks</legend>

				<div class = "tasks-completed">
					<div class = "panel panel-default">
						<div class = "panel-heading">

							<div class = "row">
								<div class = "task-text col-lg-10"><font size = "5">COMPLETED TASK 1</font></div>
								<button type = "button" class = "btn btn-info remove">...</button>
								<button type = "button" class="btn btn-danger  move-left">X</button>

							</div>

						</div>
					<div class = "panel-body">This is another description of the task. This is another description of the task. This is another description of the task. This is another description of the task.</div>
					</div>
				</div>

			</fieldset>
		</div>
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


LABEL;


 ?>
