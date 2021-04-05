<?php
$servername = "localhost";
        $username = "root";
        $password = "manoj";
        $port="3308";
        $db = "klu";

        $conn = mysqli_connect($servername, $username, $password,$db,$port);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        ?>
        
