<?php
    session_start();
    include_once("../.sys/logic/session.php");
    pageloadProtocol();
    timeoutProtocol();
    if (isset($_POST["unc"])){
        $localresults = retrieveMatches();
        $uname = $_POST["uname"];
        if (is_null($localresults)){
            $luid = $_SESSION["luid"];
            $buffer = "'" . $uname . "'";
            $result = mysqli_query($dbconfig,
            "UPDATE USER 
            SET NAME={$buffer}
            WHERE ID={$luid};")
            or die("Database Error: " . mysqli_error($dbconfig));
            $user = getUserName($uname, $luid, $_SESSION["luas"]);
            $_SESSION["uname"] = $user;
            $_SESSION["lusr"] = $uname;
            $success_uname = "Request Success: User Name successfully changed.";
        }
        else {
            if ($uname == $_SESSION["lusr"]){
                $error_cname = "Cannot Execute Request: New User Name [$uname] is similar to current.";
            }
            else {
                $error_cname = "Cannot Execute Request: New User Name [$uname] has a duplicate.";
            }
        }
        unset($_POST["unc"]);
    }
    if (isset($_POST["pwc"])){
        $luid = $_SESSION["luid"];
        $buffer = mysqli_query($dbconfig,
        "SELECT *
        FROM USER
        WHERE ID={$luid};")
        or die("Database Error: " . mysqli_error($dbconfig));
        $chunk = mysqli_fetch_assoc($buffer);
        if ($_POST["opsw"] != $chunk["WORD"]) {
            $error_opsw = "Cannot Execute Request: Old password does not match record.";
        }
        elseif ($_POST["npsw"] == $chunk["WORD"]) {
            $error_npsw = "Cannot Execute Request: New password is similar to current.";
        }
        elseif ($_POST["npsw"] != $_POST["cpsw"]) {
            $error_cpsw = "Cannot Execute Request: Passwords do not match.";
        }
        else {
            $load = "'" . $_POST["npsw"] . "'";
            $result = mysqli_query($dbconfig,
            "UPDATE USER 
            SET WORD={$load}
            WHERE ID={$luid};")
            or die("Database Error: " . mysqli_error($dbconfig));
            $success_pword = "Request Success: Password successfully changed.";
        }
        unset($_POST["pwc"]);
    }
    if (isset($_POST["secc"])){
        $luid = $_SESSION["luid"];
        $secq = "'" . $_POST["secq"] . "'";
        $seca = "'" . $_POST["seca"] . "'";
        $result = mysqli_query($dbconfig,
        "UPDATE SECURITY
        SET QUE={$secq}, ANS={$seca}
        WHERE UID={$luid};")
        or die("Database Error: " . mysqli_error($dbconfig));
        $success_security = "Request Success: Security details successfully changed.";
        unset($_POST["secc"]);
    }
    unset($_POST);
    pageendProtocol();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta author="Silverous Black">
        <meta charset="utf-8">
        <meta summary="Profile Management page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
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
            <li><a class="active" href="">Manage Profile</a></li>
            <li><a href="manage.php">Manage Ciphers</a></li>
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
                <h1>Profile Management</h1>
                <p>Hi <b><?php echo $_SESSION["uname"]; ?></b>! You can change usernames, passwords and others here!</p>
                <hr>
                <h2>User Name</h2>
                <?php
                    if (isset($success_uname)){
                        echo "<p class=success>{$success_uname}</p>";
                    }
                ?>
                <form method="post" action="">
                    <input type="hidden" name="unc" value="true">
                    <label for="uname">New User Name</label>
                    <br>
                    <input type="text" name="uname" placeholder="New User Name" value="<?php echo $_SESSION["lusr"]; ?>" required>
                    <?php
                        if (isset($error_cname)){
                            echo "<br>";
                            echo "<p class=error>{$error_cname}</p>";
                        }
                    ?>
                    <br>
                    <button class="login" type="submit" onclick>Change User Name</button>
                </form>
                <hr>
                <h2>Password</h2>
                <?php
                    if (isset($success_pword)){
                        echo "<p class=success>{$success_pword}</p>";
                    }
                    if ($_SESSION["luas"] == 1){
                        echo "<p class=notice>It is advised to keep administrator credentials constant.</p>";
                    }
                ?>
                <form method="post" action="">
                    <input type="hidden" name="pwc" value="true">
                    <label for="opsw">Old Password</label>
                    <br>
                    <input type="password" name="opsw" placeholder="Old Password" required>
                    <?php
                        if (isset($error_opsw)){
                            echo "<br>";
                            echo "<p class=error>{$error_opsw}</p>";
                        }
                    ?>
                    <br>
                    <label for="npsw">New Password</label>
                    <br>
                    <input type="password" name="npsw" placeholder="New Password" required>
                    <?php
                        if (isset($error_npsw)){
                            echo "<br>";
                            echo "<p class=error>{$error_npsw}</p>";
                        }
                    ?>
                    <br>
                    <label for="cpsw">Confirm Password</label>
                    <br>
                    <input type="password" name="cpsw" placeholder="Confirm Password" required>
                    <?php
                        if (isset($error_cpsw)){
                            echo "<br>";
                            echo "<p class=error>{$error_cpsw}</p>";
                        }
                    ?>
                    <br>
                    <button class="login" type="submit" onclick>Change Password</button>
                </form>
                <hr>
                <h2>Security Details</h2>
                <?php
                    if (isset($success_security)){
                        echo "<p class=success>{$success_security}</p>";
                    }
                ?>
                <form method="post" action="">
                    <input type="hidden" name="secc" value="true">
                    <label for="npsw">Security Question</label>
                    <br>
                    <input type="text" name="secq" placeholder="New Security Question">
                    <br>
                    <label for="cpsw">Security Answer</label>
                    <br>
                    <input type="text" name="seca" placeholder="New Security Answer">
                    <br>
                    <button class="login" type="submit" onclick>Change Security Details</button>
                </form>
            </div>
        </div>
    </body>
</html>