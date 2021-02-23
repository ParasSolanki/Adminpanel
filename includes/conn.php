<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $database = 'student_portal';

    $conn = new mysqli($serverName, $userName, $password, $database);

    if($conn->connect_error){
        die("Could not connect with database..".$conn->connect_error);
    }  
?>