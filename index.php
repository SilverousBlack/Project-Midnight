<?php
    include_once("../.sys/session.php");
    if ((preg_match('/\.(?:png|jpg|jpeg|gif|pdf)$/', $_SERVER["REQUEST_URI"])) && ($launch != 0)) {
        return false;
    }
    else {
        header("Location: src/pages/login.php", false, 301);
    }
?>
