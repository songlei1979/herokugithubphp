<?php
include_once "class/Administrator.php";
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $admin = new Administrator();
    $admin->login();
    if (!is_null($admin->id )){
        session_start();
        $_SESSION['admin_id'] = $admin->id;
        echo "<p><a href='liststudents.php'>List students</a></p>";
    }

}
