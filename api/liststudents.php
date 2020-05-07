<?php
session_start();
if (isset($_SESSION['admin_id'])){
    include_once "../class/Administrator.php";
    $admin = new Administrator();
    $students = $admin->showStudents();
    $stds = json_encode($students);
    echo $stds;
}else{
    $msg = json_encode("you are not login");
    echo $msg;
}

