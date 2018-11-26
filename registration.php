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
		First Name: <input type="text" id="fname" placeholder="Kevin" required><br><br>
		Last Name: <input type="text" id="lname" placeholder="Hung" required><br><br>
		User Name: <input type="text" id="uname" placeholder="khung" required><br><br>
		Password: <input type="password" id="pword" placeholder="******" required><br><br>
		<button type="submit" class="btn btn-default" id="submit">Submit</button>
		<button type="reset" class="btn btn-default" id="reset">Reset</button>
		<?php
			if(isset($_POST['submit'])){
				
			}
		?>
	</form>





</body>
</html>