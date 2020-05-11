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
        $link=new stdClass();
        $link->name = 'List Student';
        $link->url = 'listStudents.html';
        array_push($links, $link);
        $link=new stdClass();
        $link->name = 'List lectures';
        $link->url = 'listlectures.php';
        array_push($links, $link);
        echo json_encode($links);
    }

}else{
    $msg = json_encode("wrong login");
    echo $msg;
}
