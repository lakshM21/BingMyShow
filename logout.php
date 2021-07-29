<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['isLoggedIn']);
    unset($_SESSION['userId']);


    if(session_destroy()) // Destroying All Sessions
    {
        header('Location: ' . $_SERVER['HTTP_REFERER']); // Redirecting To Home Page
    }
?>