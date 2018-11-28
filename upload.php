<?php
    session_start();
	if (isset($_SESSION["username"]) || isset($_SESSION['password'])) {

		if(isset($_POST["username"]) && isset($_POST["password"])){
			$username = trim($_POST["username"]);
			$password = trim($_POST["password"]);

		} else{
			$username = trim($_SESSION["username"]);
			$password = trim($_SESSION["password"]);
		}
		$newImage=$_POST['upload'];
		$host="localhost";
		$user="dbuser";
		$serverpassword="";
		$database="scheduleusers";
		$db_connection=new mysqli($host, $user, $serverpassword, $database);
		if ($db_connection->connect_error) {
			echo "<br>database is not set up properly/was not able to properly connect to dB. This page is invalid<br>";
			die($db_connection->connect_error);
		}else{
		#echo $_POST['upload'];
		#echo $_SESSION['username'];
		#echo $_SESSION['password'];
			$values = $db_connection->query("update users set picture='$newImage' 'where username='$username' and password='$password'");	
			$db_connection->close();
		}

	}else{
		echo "hi";
	}



header("Location: ./planner.php");
?>