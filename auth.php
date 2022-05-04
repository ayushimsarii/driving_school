<?php
    session_start();
    if(!isset($_SESSION["phase"])) {
        // header("Location: phases.php");
        // header("Location: Next-home.php");
        exit();
    }
?>