<?php
    session_start();
    include_once("../.sys/logic/session.php");
    $error_uname = "";
    $error_pword = "";
    if (isset($_POST["uname"])){
        $pings = retrieveMatches();
        if (!(is_null($pings))){
            $uname = $_POST["uname"];
            $error_uname = "Username [{$uname}] already exists in database! Consider changing.";
        }
        else {
            if (!(verifyPassWord($_POST["psw"]))){
                $error_pword = "Password must be at least 8 characters and at most 20 characters.";
            }
            else {
                $ret = recordEntry($_POST["uname"], $_POST["psw"], $_POST["secq"], $_POST["seca"]);
                $localResults = retrieveMatches();
                $user = getUserName($localResults["NAME"], $localResults["ID"], $localResults["ASTAT"]);
                $_SESSION["uname"] = $user;
                $_SESSION["lusr"] = $localResults["NAME"];
                $_SESSION["luid"] = $localResults["ID"];
                $_SESSION["luas"] = boolval($localResults["ASTAT"]);
                unset($_POST["secq"]);
                unset($_POST["seca"]);
                unset($_POST["psw"]);
                header("Location: profile.php", true, 301);
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
        <meta summary="Sign Up page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
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
            <li><a class="active" href="">Sign Up</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Sign Up</h1>
                <h2>Welcome to Project Midnight <img src="../resources/images/icon-16.png"></h2>
                <p>Welcome! We're glad to have you here!</p>
                <p>Complete the form to register and sign up.</p>
                <form method="post" action="">
                    <label for="uname">Username</label>
                    <br>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <br>
                    <?php
                        echo ("<p class=error>{$error_uname}</p>");
                    ?>
                    <br>
                    <label for="psw">Password</label>
                    <br>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <br>
                    <?php
                        echo ("<p class=error>{$error_pword}</p>");
                    ?>
                    <br>
                    <label for="secq">Security Question</label>
                    <br>
                    <input type="text" placeholder="Security Question" name="secq" style="width: 100%">
                    <br>
                    <p class="notice">The security question [optional] would be used later to retrieve your log in credentials in case they are lost.</p>
                    <br>
                    <label for="seca">Security Question Answer</label>
                    <br>
                    <input type="text" placeholder="Security Answer" name="seca" style="width: 100%">
                    <br>
                    <p class="notice">Take note of your security question and answer! Both must match to retrieve an account.</p>
                    <br>
                    <button class="login" type="submit" onclick>Sign Up</button>
                    <label>
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                    <p>By registering, you agree to our privacy statement</p>
                </form>
                <p>Already registered? <a href="login.php">Log In here.</a></p>
            </div>
        </div>
    </body>
</html>
