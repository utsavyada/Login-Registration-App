<?php
    session_start();
    session_unset();
    session_destroy();
    header("location: /utsav/final/login.php");
    exit;
?>