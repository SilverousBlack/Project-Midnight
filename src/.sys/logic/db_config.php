<?php
    $dbserver = "localhost";
    $dbuser = "user";
    $dbpword = "";
    $dbname = "MIDNIGHT";
    $dbconfig = mysqli_connect($dbserver, $dbuser, $dbpword, $dbname);
    if ($dbconfig === false) {
        $error = mysqli_connect_error();
        die("Database Connection Error: {$error}\nAlter `src/.sys/logic/db_config.php` to fix errors.");
    }
?>