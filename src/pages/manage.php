<?php
    session_start();
    include_once("../.sys/logic/session.php");
    pageloadProtocol();
    timeoutProtocol();
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Manage Profile page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Log In</title>
        <link rel="icon" type="images/png" sizes="256x256" href="../resources/images/icon-256.png">
        <link rel="icon" type="images/png" sizes="128x128" href="../resources/images/icon-128.png">
        <link rel="icon" type="images/png" sizes="64x64" href="../resources/images/icon-64.png">
        <link rel="icon" type="images/png" sizes="32x32" href="../resources/images/icon-32.png">
        <link rel="icon" type="images/png" sizes="16x16" href="../resources/images/icon-16.png">
        <link rel="stylesheet" type="text/css" href="../scripts/css/basic.css">
        <link rel="stylesheet" type="text/css" href="../scripts/css/onboard.css">
    </head>
    <body>
        <ul>
            <img class="banner" src="../resources/images/banner logo medium.png" alt="Project Midnight Banner Logo Medium">
            <li><a href="profile.php">Manage Profile</a></li>
            <li><a class="active" href="">Manage Ciphers</a></li>
            <li><a href="live.php">Live Cipher</a></li>
            <?php
                if ($_SESSION["luas"] == 1){
                    echo "<li><a class='adminoff' href=db.php>Database Server</a></li>";
                }
            ?>
            <li><a href="../.sys/logic/logout.php" class="logout">Log Out</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Cipher Management<h2>
            </div>
        </div>
    </body>
</html>