<?php
    session_start();
    if(!(isset($_POST['key']))){
        $_SESSION['editing'] = "true";
        header("Location: task.php");
    } else{
        $taskKey = $_POST['key'];
        $whatToDo = $_POST['whatToDo'];
        $username = trim($_SESSION["username"]);
        $password = trim($_SESSION["password"]);
        $host="localhost";
        $user="dbuser";
        $serverpassword="";
        $database="scheduleusers";
        $db_connection=new mysqli($host, $user, $serverpassword, $database);
        if($whatToDo == "remove"){
            if(empty(unserialize($_SESSION['todo']))){
                $uns = unserialize($_SESSION['completed']);
                $str = 'completed';
            } else{
                $uns = unserialize($_SESSION['todo']);
                $str = 'todo';
            }
            unset($uns[$taskKey]);
            $new = serialize($uns);
            $_SESSION[$str] = $new;
            if($str == 'todo'){
                $db_connection->query("update users set todo='$new' where username='$username' and password='$password'");
            } else{
                $db_connection->query("update users set completed='$new' where username='$username' and password='$password'");
            }
        } elseif ($whatToDo == "complete"){
            $todouns = unserialize($_SESSION['todo']);
            if(isset($_SESSION['completed']) && $_SESSION['completed'] != null){
                $compuns = unserialize($_SESSION['completed']);
            }
            if(!(isset($compuns))){
                $compuns = array($taskKey => $todouns[$taskKey]);
                $compser = serialize($compuns);
                $_SESSION['completed'] = $compser;
            } else{
                $compuns[$taskKey] = $todouns[$taskKey];
                $compser = serialize($compuns);
                $_SESSION['completed'] = $compser;
            }
            unset($todouns[$taskKey]);
            $newtodo = serialize($todouns);
            $_SESSION['todo'] = $newtodo;
            $db_connection->query("update users set todo='$newtodo',completed='$compser' where username='$username' and password='$password'");
        } else{
            $values = $db_connection->query("select * from users where username='$username' and password='$password'");
    		if($values->num_rows > 0){
                $row = $values->fetch_assoc();
                if($_POST['type'] == 'todoTask'){
                    $list = $row['todo'];
                } else {
                    $list = $row['completed'];
                }
                $uns = unserialize($list);
                $newTask = $_POST['newT'];
                $newDesc = $_POST['newD'];
                unset($uns[$taskKey]);
                $uns[$newTask] = $newDesc;
                $new = serialize($uns);
                if($_POST['type'] == 'todoTask'){
                    $_SESSION['todo'] = $new;
                    $db_connection->query("update users set todo='$new' where username='$username' and password='$password'");
                } else {
                    $_SESSION['completed'] = $new;
                    $db_connection->query("update users set completed='$new' where username='$username' and password='$password'");
                }
                echo "SUCCESS";
            }
        }
        $db_connection->close();
        //echo "HELLO THERE";
        //header("Content-type: application/json");
    }
 ?>
