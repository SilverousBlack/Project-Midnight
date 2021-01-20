<?php
    session_start();
    include_once("../.sys/logic/session.php");
    $error_uname = "";
    $error_pword = "";
    if (isset($_POST["uname"])) {
        $localResults;
        try {    
            $localResults = retrieveMatches();
        }
        catch (Exception $e){
            $uname = $_POST["uname"];
            $error_uname = "Username [{$uname}] not found on database!";
            header("Location: ", true, 301);
        }
        if (is_null($localResults)){
            $uname = $_POST["uname"];
            $error_uname = "Username [{$uname}] not found on database!";
            header("Location: ", true, 301);
        }
        else {
            if ($_POST["psw"] == $localResults["WORD"]){
                $user = getUserName($localResults["NAME"], $localResults["ID"], $localResults["ASTAT"]);
                $_SESSION["uname"] = $user;
                $_SESSION["lusr"] = $localResults["NAME"];
                $_SESSION["luid"] = $localResults["ID"];
                $_SESSION["luas"] = $localResults["ASTAT"];
                $_SESSION["lact"] = hrtime(true);
                unset($_POST["psw"]);
                header("Location: profile.php", true, 301);
                exit();
            }
            else {
                global $error_pword;
                $uname = $_POST["uname"];
                $error_pword = "Username [{$uname}] and Password does not match";
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
        <meta summary="Log In page of Project Midnight. Project Midnight is a part of Enthereon Cipher Projects by S. Black, and is a predecessor of Project Eclipse. Read license notice for information on copyrights.">
        <title>Midnight: Log In</title>
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
            <li><a class="active" href="">Log In</a></li>
            <li><a href="signup.php">Sign Up</a></li>
            <li><a href="../../docs/Enthereon Cipher Projects.pdf">About: Enthereon Cipher Projects</a></li>
            <li><a href="../../docs/Project Midnight.pdf">About: Project Midnight</a></li>
            <li><a href="../../LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Log In</h1>
                <h2>Welcome to Project Midnight <img src="../resources/images/icon-16.png"></h2>
                <p>Login to continue.</p>
                <form method="post" action="">  
                    <label for="uname"><b>Username</b></label>
                    <br>
                    <input type="text" placeholder="Enter Username" name="uname" required>
                    <?php
                        echo ("<p class=error>{$error_uname}</p>");
                    ?>
                    <br>
                    <label for="psw"><b>Password</b></label>
                    <br>
                    <input type="password" placeholder="Enter Password" name="psw" required>
                    <?php
                        echo ("<p class=error>{$error_pword}</p>");
                    ?>
                    <br>
                    <button class="login" type="submit" onclick>Login</button>
                    <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </form>
                <p>Not yet registered? <a href="signup.php">Sign up here.</a></p>
                <p>Lost your account? <a href="retrieve.php">Retrieve here.</a></p>
            </div>
        </div>
    </body>
</html>
<?php
    if (isset($_SESSION["alert"])){
        alert($_SESSION["alert"]);
        unset($_SESSION["alert"]);
    }
?>
