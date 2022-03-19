<?php
    //written in order of parameters need for function
    $dbServername = "localhost";
    $dbUsername = "root";
    $dbPassoword ="";
    $dbname = "game_test";
    // sql connect function 
    $conn = mysqli_connect($dbServername,$dbUsername,$dbPassoword,$dbname);
    if (!$conn){
        die("connection failed: " .mysqli_connect_error());
    }