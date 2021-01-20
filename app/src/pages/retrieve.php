<?php
    session_start();
    include_once("../.sys/logic/session.php");
    if (isset($_POST["ret"])){
        $retrieve_stat = true;
        $uid = $_POST["uid"];
        $que = $_POST["secq"];
        $ans = $_POST["seca"];
        $result = mysqli_query($dbconfig,
        "SELECT * 
        FROM SECURITY
        WHERE UID={$uid};")
        or die("Database Error: " . mysqli_error($dbconfig));
        if (!($result)){
            $error_ret = "Cannot Execute Request: Cannot find security records of User with ID [#{$uid}].";
        }
        else {
            $local = mysqli_fetch_assoc($result);
            if (is_null($local)) {
                $error_ret = "Cannot Execute Request: User [#{$uid}] has null security records.";
            }
            else {
                if (!($que == $local["QUE"] && $ans == $local["ANS"])){
                    $error_ret = "Cannot Execute Request: Security records for User [#{$uid}] does not match records.";
                }
                else {
                    $result = mysqli_query($dbconfig,
                    "SELECT NAME, WORD
                    FROM USER
                    WHERE ID={$uid};")
                    or die("Database Error: " . mysqli_error($dbconfig));
                    $local = mysqli_fetch_assoc($result);
                    $ret_uname = $local["NAME"];
                    $ret_pword = $local["WORD"];
                    $ret_success = "Request Success: Account credentials for User [#{$uid}] is successful.";
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
        <meta summary="Account Retrieval page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Sign Up</title>
        <link rel="icon" type="images/png" sizes="256x256" href="../resources/images/icon-256.png">
        <link rel="icon" type="images/png" sizes="128x128" href="../resources/images/icon-128.png">
        <link rel="icon" type="images/png" sizes="64x64" href="../resources/images/icon-64.png">
        <link rel="icon" type="images/png" sizes="32x32" href="../resources/images/icon-32.png">
        <link rel="icon" type="images/png" sizes="16x16" href="../resources/images/icon-16.png">
        <link rel="stylesheet" type="text/css" href="../scripts/css/basic.css">
    </head>
    <body>
        <ul>
            <img class="banner" src="../resources/images/banner logo medium.png" alt="Project Midnight Banner Logo Medium">
            <li><a href="login.php">Log In</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Account Retrieval</h1>
                <p>Retreive your account here!</p>
                <p>Complete the form to attempt retrieving your account.</p>
                <form method="post" action="">
                    <input type="hidden" name="ret" value="true">
                    <label for="uid">User ID</label>
                    <br>
                    <input type="number" name="uid" placeholder="User ID" required>
                    <br>
                    <p>The User ID (UID) is the first three digits of your User Tag ("#xxxx").</p>
                    <br>
                    <label for="secq">Security Question</label>
                    <br>
                    <input type="text" name="secq" placeholder="Security Question" required>
                    <br>
                    <label for="seca">Security Question Answer</label>
                    <br>
                    <input type="text" name="seca" placeholder="Security Answer" required>
                    <br>
                    <button class="login" type="submit">Retrieve</button>
                </form>
                <p>Remember your credentials? <a href="login.php">Log in here.</a></p>
                <p>Do you want to sign up? <a href="signup.php">Sign up here.</a></p>
                <?php
                    if (isset($retrieve_stat)){
                        echo "<hr>";
                        echo "<h2>Results</h2>";
                        if (isset($error_ret)){
                            echo "<p class=error>{$error_ret}</p>";
                        }
                        else {
                            echo "<p class=success>{$ret_success}</p>";
                            echo "<p class=warning>Quickly take note of your credentials. We are not liable for any leak of information.</p>";
                            echo "<form>";
                            echo "<label>User Name</label><br>";
                            echo "<input type=text type=value value='{$ret_uname}' readonly><br>";
                            echo "<label>Password</label><br>";
                            echo "<input type=text value='{$ret_pword}' readonly>";
                            unset($retrive_stat);
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>