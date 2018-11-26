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
	<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">  
		<h1>User Registration</h1><br>
		First Name: <input type="text" id="fname" name="fname" placeholder="Kevin" required><br><br>
		Last Name: <input type="text" id="lname" name="lname" placeholder="Hung" required><br><br>
		User Name: <input type="text" id="uname" name="uname" placeholder="khung" required><br><br>
		Password: <input type="password" id="pword" name="pword" placeholder="******" required><br><br>
		<button type="submit" class="btn btn-default" name="submit" id="submit">Submit</button>
		<button type="reset" class="btn btn-default" id="reset">Reset</button>
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
						echo "no good";
						die($db_connection->connect_error); 
					}else{
						echo "logged into dB okay.";
					}
				#}
				if(isset($_POST['pword'])){
						$query = "insert into users (firstname, lastname, username, password) values(\"".$_POST['fname']."\",\"".$_POST['lname']."\",\"".$_POST['uname']."\",\"".$_POST['pword']."\")";
						echo $query;
				}
				if(isset($query)){
					$result = $db_connection->query($query); 
					if (!$result) { echo "<br>The user could not be created. Please check that you have a UNIQUE username under 20 characters!";}
				}
			}
		?>
	</form>





</body>
</html>