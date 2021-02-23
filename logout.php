<?php
    session_start();
    if(isset($_SESSION["email"]) && isset($_SESSION["firstname"])){
        unset($_SESSION["email"]);
        unset($_SESSION["firstname"]);
        session_destroy();
    }
    header("Location:login.php");
?>