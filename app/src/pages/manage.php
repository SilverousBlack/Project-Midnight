<?php
    session_start();
    include_once("../.sys/logic/session.php");
    pageloadProtocol();
    timeoutProtocol();
    alert("Page Under Construction: This page is still in development, all/multiple functionalities may be missing.");
    $luid = $_SESSION["luid"] + 0;
    $result = mysqli_query($dbconfig,
    "SELECT *
    FROM CIPHER
    WHERE UID={$luid}")
    or die("Database Error: " . mysqli_error($dbconfig));
    $copy = $result;
    $total = 0;
    $counter = 0;
    while($rows = mysqli_fetch_assoc($result)){
        $total += 1;
        $counter = $rows["ID"] + 0;
    }
    if (isset($_POST["ncn"])){
        $lcin = "'" . $_POST . "'";
        $lcid = ($luid * 1000) + $counter;
        $result = mysqli_query($dbconfig,
        "INSERT INTO
        CIPHER(ID, NAME, UID)
        VALUES ({$lcid}, {$lcin}, {$luid});")
        or die("Database Error" . mysqli_error($dbconfig));
    }
    if (isset($_POST["ccn"])){

    }
    else {
        $options = "";

    }
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Cipher Management page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
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
            <li><a href="../../docs/LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Cipher Management<h2>
                <p>Manage your ciphers here!</p>
                <hr>
                <h2>Create New Cipher<h2>
                <form method="POST" action="">
                    <input type="hidden" name="cnp">
                    <label for="ncn">New Cipher Name</label>
                    <br>
                    <input type="text" name="ncn" placeholder="Cipher Name" required>
                    <button type="submit" class="login">&rArr;</button>
                    <?php
                        if(isset($error_ncn)){
                            echo "<br><p class='error'>{$ncn}</p>";
                        }
                    ?>
                </form>
                <hr>
                <h2>Configure Cipher</h2>
                <p>Select a ciphher &rArr; Select a configuration method &rArr; Do configuration</p>
                <form>
                    <label for="ccn">Cipher Name</label>
                    <br>
                    <?php
                        if(isset($cur_cipher)){
                            echo "<input type='text' name='ccn' value='{$cur_cipher}' readonly>";
                        }
                        else {
                            echo "<select name='ccn' required>";
                            echo $options;
                            echo "</select>";
                            echo "<button type='submit' class='login'>&rArr;</button>\n";
                        }
                    ?>
                    <br>
                </form>
            </div>
        </div>
    </body>
</html>