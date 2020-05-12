<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    include_once "../class/Administrator.php";
    $admin = new Administrator();
    $admin->removeStudent($_GET["id"]);
}
