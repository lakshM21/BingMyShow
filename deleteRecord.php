<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "phplogin";

    // Takes raw data from the request
    $id = file_get_contents('php://input');

    // Converts it into a PHP object
    //$data = json_decode($json);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    echo $id;
    $sql = "DELETE FROM watchlist where id = $id ";

    $result = $conn->query($sql);


    $conn->close();
?>