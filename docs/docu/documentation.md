<!-- markdownlint-disable MD033 -->

<style>
    h1 {
        text-align: center;
    }
    p {
        text-align: justify;
        text-justify: inter-word;
    }
</style>

# Documentation

## Login Page

![Log In](Login%20Page%20Screen%20Capture.png)

```php
// src/pages/login.php
<?php
    include_once("../.sys/logic/session.php");
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
            global $error_uname;
            $uname = $_POST["uname"];
            $error_uname = "Username [{$uname}] not found on database!";
            header("Location: ", true, 301);
        }
        else {
            if ($_POST["psw"] == $localResults["WORD"]){
                $user = getUserName($localResults);
                $_SESSION["uname"] = $user;
                $_SESSION["lusr"] = $localResults["NAME"];
                $_SESSION["luid"] = $localResults["ID"];
                $_SESSION["luas"] = boolval($localResults["ASTAT"]);
                unset($_POST["psw"]);
                header("Location: profile.php", true, 301);
            }
            else {
                global $error_pword;
                $uname = $_POST["uname"];
                $error_pword = "Username [{$uname}] and Password does not match";
            }
        }
    }
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
            <li><a href="../../docs/LICENSE">License</a></li>
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
            </div>
        </div>
    </body>
</html>
```

## Sign Up Page

![Sign Up](Signup%20Page%20Screen%20Capture.png)

```php
// src/pages/signup.php
<?php
    include_once("../.sys/logic/session.php");
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
                $user = getUserName($localResults);
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
            <li><a href="../../docs/LICENSE">License</a></li>
        </ul>
        <div class="general">
            <div class="content">
                <h1>Sign Up</h1>
                <h2>Welcome to Project Midnight <img src="../resources/images/icon-16.png"></h2>
                <p>Welcome! We&rsquo;re glad to have you here!</p>
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
                    <input type="text" placeholder="Security Question" name="secq" style="width = 100%">
                    <br>
                    <p class="notice">The security question [optional] would be used later to retrieve your log in credentials in case they are lost.</p>
                    <br>
                    <label for="seca">Security Question Answer</label>
                    <br>
                    <input type="text" placeholder="Security Answer" name="seca" style="width = 100%">
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
```

## Others

### `session.php`

```php
// src/.sys/logic/session.php
<?php
    session_start();
    include_once("db_config.php");
    include_once("requiries.php");
    $error_uname = "";
    $error_pword = "";
?>
```

### `db_config.php`

```php
// src/.sys/logic/db_config.php
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
```

### `requiries.php`

```php
// src/.sys/logic/requiries.php
<?php
    include_once("db_config.php");
    function retrieveMatches(){
        global $dbconfig;
        $name = "'" . $_POST["uname"] . "'";
        $query = "SELECT * FROM USER WHERE NAME={$name}";
        $result = mysqli_query($dbconfig, $query)
        or die("Database Error [Cannot Add Entry]: " .  mysqli_error($dbconfig));
        return mysqli_fetch_assoc($result);
    }
    function generateUserNumber($number){
        $result = "";
        if ($number < 10) $result .= "00";
        elseif ($number < 100) $result .= "0";
        elseif ($number < 1000) $result .= "";
        return $result . "{$number}";
    }
    function getUserName($array){
        return $array["NAME"] . "#" . generateUserNumber($array["ID"]) . boolval($array["ASTAT"]);
    }
    function verifyPassWord(string $target){
        $size = strlen($target);
        if ($size >= 8 && $size <= 20) return true;
        else return false;
    }
    function recordEntry($name, $word, $secq, $seca){
        global $dbconfig;
        $uven = "'" . $name . "'" . ", '" . $word . "'";
        $uent = mysqli_query($dbconfig, 
        "INSERT INTO USER(NAME, WORD) 
        VALUE ({$uven});") 
        or die("Database Error [Cannot Add Entry]: " .  mysqli_error($dbconfig));
        $retr = mysqli_query($dbconfig,
        "SELECT ID FROM USER
        WHERE NAME='{$name}';")
        or die("Database Error [Cannot Add Entry]: " .  mysqli_error($dbconfig));
        $ruid = mysqli_fetch_row($retr);
        $suid = $ruid[0];
        $sven = "'{$secq}', '{$seca}', {$suid}" ;
        $sent = mysqli_query($dbconfig,
        "INSERT INTO SECURITY(QUE, ANS, UID)
        VALUES ({$sven});")
        or die("Database Error [Cannot Add Entry]: " .  mysqli_error($dbconfig));
        $ret = array($uent, $sent);
        return $ret;
    }
    function logoutProtocol(){
        global $dbconfig;
        mysqli_close($dbconfig);
        unset($_POST);
        unset($_SESSION);
    }
?>
```

## Database

![Database](DATABASE%20ELEMENTS.png)
