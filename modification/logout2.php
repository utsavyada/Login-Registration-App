<?php
    session_start();
    session_unset();
    session_destroy();
    header("location: /utsav/modification/login2.php");
    exit;
?>