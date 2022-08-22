<?php

    $conn = mysqli_connect("localhost","root","","vegefoods");

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
?>