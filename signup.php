<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "phplogin";

	// Takes raw data from the request
	$json = file_get_contents('php://input');

	// Converts it into a PHP object
	$data = json_decode($json);


	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO users(username, password, email) VALUES('$data->username', '$data->password', '$data->email')";

    $results = $conn->query($sql);
    
	$out = '{ "results" : ['.$results.']}';
	
	echo $out;


    $conn->close();
    /*
        // Redirecting To Welcome Page
			$_SESSION["user"] = $_POST["lusername"];
			$_SESSION["isLoggedIn"] = true;
			header("Location: index.php"); 
    */
?>