<?php
    session_start();
    include_once("../.sys/logic/session.php");
    pageloadProtocol();
    adminProtocol();
    timeoutProtocol();
    if (isset($_POST["pque"])){
        $query = $_POST["query"];
        $to_print = "<p class=notice><b>Received query: </b>{$query}</p>";
        $result = mysqli_query($dbconfig, $query);
        if (!($result)){
            $dberror = "Database Error: " . mysqli_error($dbconfig);
            $to_print .= "<p class=error>$dberror</p>";
        }
        else {
            $to_print .= "<p class=success>Query accepted.</p>";
            $key = explode(" ", $query)[0];
            if (!($result)){
                $to_print .= "<p class=notice>No result buffer</p>";
            }
            else {
                if ($key == "SELECT" || $key == "SHOW" || $key == "DESCRIBE"){
                    $to_print .= "<hr><table>";
                    $rows = mysqli_num_rows($result);
                    if (!($rows)) {
                        $to_print .= "<tr><td>No Data</td></tr>";
                    }
                    else {
                        $assoc = mysqli_fetch_assoc($result);
                        $headers = array_keys($assoc);
                        $to_print .= "<tr>";
                        foreach($headers as $head){
                            $to_print .= "<th>{$head}</th>";
                        }
                        $to_print .= "</tr>";
                        $to_print .= "<tr>";
                        foreach($headers as $key){
                            $dat = $assoc["$key"];
                            $to_print .= "<td>{$dat}</td>";
                        }
                        $to_print .= "</tr>";
                        while ($row = mysqli_fetch_assoc($result)){
                            $to_print .= "<tr>";
                            foreach($headers as $key){
                                $dat = $row["$key"];
                                $to_print .= "<td>{$dat}</td>";
                            }
                            $to_print .= "</tr>";
                        }
                    }
                    $to_print .= "</table>";
                }
            }
        }
    }
    unset($_POST);
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Database Server page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
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
            <li><a href="manage.php">Manage Ciphers</a></li>
            <li><a href="live.php">Live Cipher</a></li>
            <?php
                if ($_SESSION["luas"] == 1){
                    echo "<li><a class='adminon' href=''>Database Server</a></li>";
                }
            ?>
            <li><a href="../.sys/logic/logout.php" class="logout">Log Out</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Database Server</h1>
                <p><b>[Administrator Privelege]</b> Directly communicate with the database here.</p>
                <form method="post" action="">
                    <input type="hidden" name="pque" value="true">
                    <label for="query">Query</label>
                    <br>
                    <input type="text" name="query" placeholder="Database Query" required>
                    <button type="submit" class="login">&rarr;</button>
                </form>
                <?php
                    if(isset($to_print)){
                        echo "<hr><h2>Results</h2>";
                        echo "{$to_print}";
                    }
                ?>
            </div>
        </div>
    </body>
</html>