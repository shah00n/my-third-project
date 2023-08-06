<?php
    $serverName = "localhost";

    $conn = mysqli_connect($serverName, "root", "123", "studentdb");

    if(!$conn){
        die("Error connection database: " . mysqli_connect_error());
    }
    else{
        echo "Connect to database Ok....";
    }
?>