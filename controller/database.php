<?php

$dbname = "common-database";
$dbusername = "breath";
$dbpassword = "root";

try {
    $db = new PDO(
        "mysql:host=localhost;dbname=$dbname;charset=utf8",
        $dbusername,
        $dbpassword
    );
} catch (Exception $error) {
    echo $error;
}
