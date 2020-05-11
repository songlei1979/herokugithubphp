<?php
session_start();
include_once "../class/Administrator.php";
if (isset($_SESSION['admin_id'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $admin = new Administrator();
    $admin->studentUpdate($id, $name, $username);
}
