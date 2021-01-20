<?php
    include_once("db_config.php");
    function retrieveMatches(){
        global $dbconfig;
        $name = "'" . $_POST["uname"] . "'";
        $query = "SELECT * FROM USER WHERE NAME={$name}";
        $result = mysqli_query($dbconfig, $query)
        or die("Database Error: " .  mysqli_error($dbconfig));
        return mysqli_fetch_assoc($result);
    }
    function generateUserNumber($number){
        $result = "";
        if ($number < 10) $result .= "00";
        elseif ($number < 100) $result .= "0";
        elseif ($number < 1000) $result .= "";
        return $result . "{$number}";
    }
    function getUserName($name, $id, $stat){
        $astat = boolval($stat) == 1 ? 1 : 0;
        return $name . "#" . generateUserNumber($id) . $astat;
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
    function alert(string $msg){
        echo "<script type='text/javascript'>alert('{$msg}')</script>";
    }
?>