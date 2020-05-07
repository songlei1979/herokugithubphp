<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once "../class/Administrator.php";
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $admin = new Administrator();
    $admin->login($username, $pwd);
    if (!is_null($admin->id )){
        session_start();
        $_SESSION['admin_id'] = $admin->id;
        $links = array();
        array_push($links, ['List students', 'liststudents.php']);
        array_push($links, ['List lectures', 'listlectures.php']);
        echo json_encode($links);
    }

}else{
    $msg = json_encode("wrong login");
    echo $msg;
}
