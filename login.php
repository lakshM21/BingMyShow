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

    $sql = "SELECT * FROM users where username = '$data->username' and password = '$data->password'";

    $result = $conn->query($sql);

        if(	$result->num_rows > 0 )
        {
            while($row = $result->fetch_assoc())
            {
                //result->fetch_assoc gives single row
                if($out != '')
                {
                    $out .=',';
                }
                
                $valid = 'false';
                if($row['valid'] == 1)
                {
                    $valid = 'true';
                }
                
                $out .= '{"id" :'.$row['id'].' , "username" : "'.$row['username'].'" , "password" : "'.$row['password'].'" , "email" : "'.$row['email'].'"  }';
                $id = $row['id'];
            }
            $userExists = true;
            session_start();
            $_SESSION["user"] = $data->username;
            $_SESSION["userId"] = $id;
            $_SESSION["isLoggedIn"] = true;
            
        }
        else
    {
            $userExists = false;
            $error = "Login Failed User does not exists";
        
        }

    $out = '{ "result" : ['.$out.'], "loginResponse" : '.$userExists.', "error" : '.$error.', "userId" : '.$_SESSION["userId"].' }';
    echo $out;

    $conn->close();
?>