<?php
    include_once("session.php");
    logoutProtocol();
    session_destroy();
    header("Location: ../../pages/login.php", true, 301);
?>