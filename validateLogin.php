<?php 
    ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);
    ini_set('display_errors', 1);     // 0 = hide errors; 1 = display errors
    session_start();
    $user;
    $userId;
    $isLoggedIn;
    $user = $_SESSION['user'];
    $userId = $_SESSION['userId'];
    $isLoggedIn = $_SESSION['isLoggedIn'];

    
        $out = '{ "user" : "'.$user.'", "userId" : "'.$userId.'", "isLoggedIn" : '.$isLoggedIn.'}';

        echo $out;
    
    

    
   


?>