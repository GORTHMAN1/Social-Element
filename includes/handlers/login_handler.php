<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Grabbing the data
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    // Instantiate RegisterContr class

    include "../classes/config.php";
    include "../classes/Login.php";
    include "../classes/LoginContr.php";

    $login = new LoginContr($username, $password);
    
    // Running error handlers and user register

    $login->loginUser();

    // Going to back to frontpage

    header("location: /SocialElement/index.php?error=none");
}

?>