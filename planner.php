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
    <div class="container">

        <h1>Goals and Plans</h1>
        <h2>January 2019</h2>

        <div class="row">

            <fieldset class="col-lg-6">
                <legend>Goals and Tasks</legend>

                <div class="tasks-to-do">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <div class="row">
                                <div class="task-text col-lg-10">TASK 1</div>
                                <button type="button" class="btn btn-danger  move-right ">X</button>
                                <button type="button" class="btn btn-success remove  ">></button>

                            </div>

                        </div>
                        <div class="panel-body">BLAH BLAH BLAH</div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary btn-lg btn-block" id="add-task">+</button>

            </fieldset>

            <fieldset class="col-lg-6">
                <legend>Completed Tasks</legend>

                <div class="tasks-completed">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <div class="row">
                                <div class="task-text col-lg-10">COMPLETED TASK 1</div>
                                <button type="button" class="btn btn-success remove  "><</button>
                                <button type="button" class="btn btn-danger  move-left">X</button>

                            </div>

                        </div>
                        <div class="panel-body">BLAH BLAH BLAH</div>
                    </div>
                </div>

            </fieldset>
        </div>
    </div>

    <script src="bootstrap/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>