


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
	<link rel="stylesheet" href="./css/main.css">
	<link rel="stylesheet" href="./jquery-ui-1.12.1/jquery-ui.min.css">

</head>
<body>
	<div class="container">

		<?php
			echo "<img src=./21b9dfe29ac942daae2c96d9789f9ccc.jpg width=\"150\" height=\"150\" id=\"pic\" class=\"center\"></img>";
			#echo "<input type="file" name="newImage">";
		?>
		<?php

	session_start();

	if (isset($_POST["submitform"]) || isset($_SESSION['fromTask'])) {

		if(isset($_POST["username"]) && isset($_POST["password"])){
			$username = trim($_POST["username"]);
			$password = trim($_POST["password"]);

		} else{
			$username = trim($_SESSION["username"]);
			$password = trim($_SESSION["password"]);
		}
		$host="localhost";
		$user="dbuser";
		$serverpassword="";
		$database="scheduleusers";
		$db_connection=new mysqli($host, $user, $serverpassword, $database);
		if ($db_connection->connect_error) {
			echo "<br>database is not set up properly/was not able to properly connect to dB. This page is invalid<br>";
			die($db_connection->connect_error);
		}else{
			echo "<img src=./21b9dfe29ac942daae2c96d9789f9ccc.jpg width=\"150\" height=\"150\" id=\"pic\" class=\"center\"></img>";
		}
		$values = $db_connection->query("select * from users where username='$username' and password='$password'");
		if($values->num_rows > 0){
			$row = $values->fetch_assoc();
			$firstname= $row['firstname'];
			$lastname = $row['lastname'];
			$_SESSION['firstname'] = $firstname;
			$_SESSION["username"] = $username;
			$_SESSION["password"] = $password;
			if (isset($row['todo']) && is_array($row['todo'])){
				$_SESSION['todo']= $row['todo'];

			}
			if(isset($row['completed']) && is_array($row['completed'])){
				$_SESSION['completed']= $row['completed'];
			}
		} else{
			#print("CANT FIND ENTRY");

			$db_connection->close();

			header("Location: index.html");
		}


		$firstname = $_SESSION['firstname'];

		if(isset($_SESSION['fromTask'])){ unset($_SESSION['fromTask']);}

		$db_connection->close();

	}

	function showtasks(){
		if(!(isset($_SESSION['todo']) ) || $_SESSION['todo'] == null || unserialize($_SESSION['todo'] )== null) {
			echo "<p><font size = '5'> No tasks yet</font></p>";
		} else{

			$todouns = unserialize($_SESSION['todo']);

			foreach($todouns as $key => $value){
				echo <<<LABEL
				<div class="panel panel-default" id='{$key}{$value}'>
				<div class = "panel-heading">
				<div class = "row">
				<div class = "task-text col-lg-9"><font size = "5">$key</font></div>
				<button type = "button"  class = "btn btn-info"  onclick="editTask('$key','$value')">...</button>
				<button type = "button"  class = "btn btn-danger" onclick="removeTask('$key','$value')">X</button>
				<button type = "button"  class = "btn btn-success" onclick="completeTask('$key','$value')">></button>
				</div>
				</div>
				<div class = "panel-body">$value</div>
				</div>
LABEL;

			}
		}
	}

	function showCompleted(){
		if(!(isset($_SESSION['completed']) ) || $_SESSION['completed'] == null || unserialize($_SESSION['completed']) == null) {
			echo "<p><font size = '5'> No completed tasks yet</font></p>";
		} else{

			$compuns = unserialize($_SESSION['completed']);

			foreach($compuns as $key => $value){
				echo <<<LABEL
				<div class = "panel panel-default" id='{$key}{$value}'>
					<div class = "panel-heading">

						<div class = "row">
							<div class = "task-text col-lg-10"><font size = "5">$key</font></div>
							<button type = "button" class = "btn btn-info remove">...</button>
							<button type = "button" class="btn btn-danger  move-left" onclick="removeTask('$key','$value')">X</button>

						</div>

					</div>
					<div class = "panel-body">$value</div>
				</div>
LABEL;

			}
		}
	}



 ?>

 <h5>Change motivational picture:</h5>
<form action="<?php $_SERVER['PHP_SELF'] ?>">
 <input type="file" id="newPic" name="newPic">
  <input class = "btn btn-default" type="submit" onclick="changePic()">
</form>
	<div class="row">

		<h1 class="col-md-11">Goals and Plans</h1>
		<br>
		<button type = "button" class="btn btn-danger col-md-1" onclick="window.location='logout.php';">Logout</button>
	</div>


	<h2 id = "today">Welcome <?php echo $_SESSION['firstname']; ?>, today is: </h2>

		<h3 id = "currMonth">January 2019 Schedule</h3>

		<!-- These look pretty bad visually. Feel free to change them up. -->
		<button type = "button" class = "btn btn-secondary" onclick = "updateMonth(-1)"><</button>
		<button type = "button" class = "btn btn-secondary" onclick = "updateMonth(1)">></button>

		<div class="row">
			<fieldset class="col-lg-6">
				<legend>Goals and Tasks</legend>

				<div class="tasks-to-do" id = "tasks">
					<?php showtasks(); ?>

				</div>

				<button type = "button" class = "btn btn-primary btn-lg btn-block" id = "add-task" onclick="window.location='task.php';">+</button>

			</fieldset>

			<fieldset class="col-lg-6">
				<legend>Completed Tasks</legend>

				<div class = "tasks-completed">

					<?php showCompleted(); ?>
				</div>

			</fieldset>
			<div id="dialog" hidden="hidden" >
				<div class = "form-group">
					<label for = "text">Edit Task Title:</label>
					<input type = "text" class = "form-control" name="taskname">
				</div>

				<div class = "form-group">
					<label for = "text">Edit Details:</label>
					<textarea rows = "4" class = "form-control" name="description"></textarea>
				</div>
			</div>
		</div>
	</div>

	<script src="bootstrap/jquery-3.2.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="./jquery-ui-1.12.1/external/jquery/jquery.js"></script>
	<script src="./jquery-ui-1.12.1/jquery-ui.min.js"></script>
	<script>
	var month;
	var year;
	initialize();
	function changePic(){
		document.getElementById("pic").src=newPic;
	}
	function initialize() {
		var d = new Date();
		var str = d.toDateString();
		month = d.getMonth();
		year = d.getFullYear();
		document.getElementById("today").innerHTML +=  str;
		updateCurrMonth();

	}

	function editTask(name,value){
		let newTask;
		let newDesc;
		$(document).ready(function() {
			$("#dialog").dialog({

				buttons: {
					'OK': function () {
						let name = $('input[name="taskname"]').val();
						let description = $('textarea[name="description"]').val();
						newTask = name;
						newDesc = description;
						$(this).dialog('close');
					},
					'Cancel': function () {
						$(this).dialog('close');
					}
				},

				close: function(event, ui) {
					$.post('./manageTask.php', {key:name, newT: newTask, newD: description, whatToDo:"edit"}, function(response) {
						console.log("Output: "+response);
					});
				}
			});
		});
		location.reload();
	}
	function removeTask(name,value){

		$.post('./manageTask.php', {key:name, whatToDo:"remove"}, function(response) {
			console.log("Output: "+response);
		});
		document.getElementById(`${name}${value}`).outerHTML = "";


	}
	function completeTask(name,value){
		$.post('./manageTask.php', {key:name, whatToDo:"complete"}, function(response) {
			console.log("Output: "+response);
		});
		document.getElementById(`${name}${value}`).outerHTML = "";
		location.reload();
	}

	function monthStr(arg) {
		if (arg == 0)
		return "January";

		else if (arg == 1)
		return "February";

		else if (arg == 2)
		return "March";

		else if (arg == 3)
		return "April";

		else if (arg == 4)
		return "May";

		else if (arg == 5)
		return "June";

		else if (arg == 6)
		return "July";

		else if (arg == 7)
		return "August";

		else if (arg == 8)
		return "September";

		else if (arg == 9)
		return "October";

		else if (arg == 10)
		return "November";

		else
		return "December";
	}

	function updateMonth(i) {
		month += i;

		if (month < 0) {
			month = 11;
			year--;
		}

		else if (month > 11) {
			month = 0;
			year++;
		}

		updateCurrMonth();
	}

	function updateCurrMonth() {
		document.getElementById("currMonth").innerHTML = monthStr(month) + " " + year + " Schedule";
	}
	</script>
</body>
</html>
