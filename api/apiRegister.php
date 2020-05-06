<?php

if (isset($_POST["name"])){
    include_once "../class/Student.php";
    $student = new Student(null, $_POST["name"], $_POST["username"], $_POST["password"]);
    $student->save();
    $msg = "new user has been added";
}else{
    $msg = "nothing has been added";
}
$msg = json_encode($msg);
echo $msg;

