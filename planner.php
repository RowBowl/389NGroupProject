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

		<h1>Goals and Plans</h1>
		<h2 id = "today"></h2> 
		<h3 id = "currMonth">January 2019 Schedule</h3>
		
		<!-- These look pretty bad visually. Feel free to change them up. -->
		<button type = "button" class = "btn btn-secondary" onclick = "updateMonth(-1)"><</button>
		<button type = "button" class = "btn btn-secondary" onclick = "updateMonth(1)">></button>
		
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
		var month;
		var year;
		initialize();
		
		function initialize() {
			var d = new Date();
			var str = d.toDateString();
			month = d.getMonth();
			year = d.getFullYear();
			document.getElementById("today").innerHTML = str;
			updateCurrMonth();
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
