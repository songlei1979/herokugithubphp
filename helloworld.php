<?php

$host = 'us-cdbr-iron-east-01.cleardb.net';
$dbuser = 'b201689fe510f0';
$dbpwd = '12117bab';
$dbname = 'heroku_38954b5e03dd24b';

$db = new mysqli($host, $dbuser, $dbpwd, $dbname);
if ($db->connect_error){
    echo $db->connect_error;
}


$sql = "select * from user";
$res = $db->query($sql);

if ($res->num_rows>0){
    while ($row = $res->fetch_assoc()){
        echo "<br>id: ".$row['id']."name: ".$row['name'];
    }
}


?>
