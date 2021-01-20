<?php
    include_once("requiries.php");
    function logoutProtocol(){
        global $dbconfig;
        mysqli_close($dbconfig);
        unset($_POST);
        unset($_SESSION);
    }
    function pageloadProtocol(){
        global $dbconfig;
        if (!(isset($_SESSION["luid"]))){
            header("Loacation: login.php", true, 301);
            exit();
        }
        else {
            $luid = $_SESSION["luid"];
            $result = mysqli_query($dbconfig,
            "SELECT * 
            FROM USER
            WHERE ID={$luid};")
            or die("Database Error: " . mysqli_error($dbconfig));
            $localResults = mysqli_fetch_assoc($result);
            $user = getUserName($localResults["NAME"], $localResults["ID"], $localResults["ASTAT"]);
            $_SESSION["uname"] = $user;
            $_SESSION["lusr"] = $localResults["NAME"];
            $_SESSION["luid"] = $localResults["ID"];
            $_SESSION["luas"] = $localResults["ASTAT"];
        }
    }
    function timeoutProtocol(){
        $cur = hrtime(true);
        $elapsed = (($cur - $_SESSION["lact"]) / 1e+9) / 60;
        if ($elapsed > 10){
            $_SESSION["alert"] = "System Timeout: Please log in again";
            header("Location: login.php", true, 301);
        }
    }
    function adminProtocol(){
        if ($_SESSION["luas"] == 0){
            $_SESSION["alert"] = "Administrator-only Page: Log in with an administrator account to access.";
            logoutProtocol();
            header("Location: login.php", true, 301);
        }
    }
    function pageendProtocol(){
        $_SESSION["lact"] = hrtime(true);
    }
?>