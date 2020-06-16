<?php

include_once "../class/Administrator.php";

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
    $login = new Administrator();
    $login->login($username, $password);

    switch($login->role) {
        case 'senior':
            echo 'senior';
            break;
        case 'assistant':
            echo 'assistant';
            ?>
    <div class="block">
        <p><a href="page/addAdmission.php">Add Admission</a></p>
        <p><a href="page/admissionReport.php">Admission Report</a></p>
        <p><a href="page/updateAdmission.php">Update Admission</a></p>
        <p><a href="page/closeAdmission.php">Close Admission</a></p>
        <p><a href="page/deleteAdmission.php">Delete Admission</a></p>
    </div>
<?php
            break;
        case 'facility':
            echo 'facility';
            break;
        case 'pharmacy':
            echo 'pharmacy';
            break;
        case 'research':
            echo 'research';
            break;
        case 'clerk':
            echo 'clerk';
            break;
    }
}

