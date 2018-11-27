<?php

	if(isset($_POST['tasksubmit'])){
		session_start();



		$username = trim($_SESSION["username"]);
		$password = trim($_SESSION["password"]);
		if( isset($_SESSION['editing']) ) {
			$editingTask = $_SESSION['editing'];
		}
		$host="localhost";
		$user="dbuser";
		$serverpassword="";
		$database="scheduleusers";
		$db_connection=new mysqli($host, $user, $serverpassword, $database);
		if ($db_connection->connect_error) {
			echo "<br>database is not set up properly/was not able to properly connect to dB. This page is invalid<br>";
			die($db_connection->connect_error);
		}

		$values = $db_connection->query("select todo from users where username='$username' and password='$password'");
		if($values->num_rows > 0){
			$row = $values->fetch_assoc();
			if(isset($row['todo']) && $_SESSION['todo'] != null){
				$todo = unserialize($row['todo']);
				if(isset($editingTask)){
					$todo[$editingTask] = $_POST['description'];
					changeKey($todo, $editingTask,$_POST['taskname'] );
					$todoserialized = serialize($todo);

				} else{
					$todo[$_POST['taskname']] = $_POST['description'];
					$todoserialized = serialize($todo);
				}
				$_SESSION['todo'] = $todoserialized;
				$db_connection->query("update users set todo='$todoserialized' where username='$username' and password='$password'");
			} else{
				$todo = array($_POST['taskname'] => $_POST['description']);
				$todoserialized = serialize($todo);
				$_SESSION['todo'] = $todoserialized;
				$db_connection->query("update users set todo='$todoserialized' where username='$username' and password='$password'");

			}
			unset($editingTask);
			unset($_SESSION['editing']);
			$_SESSION['fromTask'] = "true";
			header("Location: planner.php");
		}
	}

	function changeKey($arr, $key1, $key2){
		$i = array_search($key1, $keys);
		$keys = array_keys($arr);

		if ($i) {
			$keys[$i] = $key2;
			$arr = array_combine($keys, $arr);
		}

		return $arr;
	}
 ?>


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

		<form method = "post" action="<?php $_SERVER['PHP_SELF'] ?>">
		<div class = "form-group">
			<label for = "text">Task:</label>
			<input type = "text" class = "form-control" name="taskname">
		</div>

		<div class = "form-group">
			<label for = "text">Details:</label>
			<textarea rows = "4" class = "form-control" name="description"></textarea>
		</div>

		<div class = "form-group">
			<label for = "text">Deadline:</label>
			<input type = "date" class = "form-control">
		</div>

		<br>
		<button type = "submit" class = "btn btn-default" name="tasksubmit">Submit</button> &nbsp;
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
