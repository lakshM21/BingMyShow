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

    $sql = "SELECT * FROM watchlist where content_user_id = $data->userId ";

    $result = $conn->query($sql);

    //echo $result;

    $out="";

    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            //echo "<h1>".$row['id']."   ".$row['name']."</h1><br/>";
            if($out != '')
            {
                $out .= ',';
            }
            
            $out .= '{"id":'.$row['id'].' , "title" : "'.$row['content_name'].'" , "imgUrl" : "'.$row['content_imgUrl'].'", "userId" : '.$row['content_user_id'].' }';
        }
    } else 
    {
        echo "0 results";
    }
    $out = '{"result" : ['.$out.']}';
    echo $out;

    $conn->close();
?>