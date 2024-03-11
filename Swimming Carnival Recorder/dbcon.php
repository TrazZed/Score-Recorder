<?php
    //Remove ability to modify header information
    ob_start();
    session_start();
    //Assign required connection data to variables
	$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "swimmingrec";
    
    //Create connection to database and assign to variable
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    //If no connection can be made, stop running page and echo error message
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>