<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
</head>

<body>
	<div class="container">
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">  
			<h1>User Registration</h1><br>
			First Name: <input type="text" class="form-control" id="fname" name="fname" placeholder="Kevin" required><br><br>
			Last Name: <input type="text" class="form-control" id="lname" name="lname" placeholder="Hung" required><br><br>
			User Name: <input type="text" class="form-control" id="uname" name="uname" placeholder="khung" required><br><br>
			Password: <input type="password" class="form-control" id="pword" name="pword" placeholder="******" required><br><br>
			<button type="submit" class="btn btn-default" name="submit" id="submit">Submit</button> &nbsp
			<button type="reset" class="btn btn-default" id="reset">Reset</button>
		</form>
	<div>
		<?php
			#echo "here1";
			if(isset($_POST['submit'])){
				#if ($_POST['submit'] == 'Submit') { 
					#echo "echo2";
					$host="localhost";
					$user="dbuser";
					$password="";
					$database="scheduleusers";
					$db_connection=new mysqli($host, $user, $password, $database); 
					if ($db_connection->connect_error) { 
						echo "<br>database is not set up properly/was not able to properly connect to dB. This page is invalid<br>";
						die($db_connection->connect_error); 
					}else{
						echo "<br>logged into dB okay.<br>";
					}
				#}
				if(isset($_POST['pword'])){
						$query = "insert into users (firstname, lastname, username, password) values(\"".$_POST['fname']."\",\"".$_POST['lname']."\",\"".$_POST['uname']."\",\"".$_POST['pword']."\")";
						#echo $query;
				}
				if(isset($query)){
					$result = $db_connection->query($query); 
					if (!$result) { echo "<br>User has not been created yet. Please be sure that you have a UNIQUE username under 20 characters!<br>";}else{
						echo '<script language="javascript">';
						echo 'alert("account successfully created")';
						echo '</script>';
						echo '<br><form action="./index.html" novalidate>'; 
						echo '<button type="submit" class="btn btn-default" name="submit" value="administrative">return to main menu</button>'; 
						echo '</form>'; 
						#header('Location:./index.html');
					}
				}
			}
		?>





</body>
</html>