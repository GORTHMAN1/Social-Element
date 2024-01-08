<?php

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $userId = $_SESSION["userid"];
    $usernameU = $_SESSION["username"];
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    $profilePicture = htmlspecialchars($_POST["profilePicture"], ENT_QUOTES, "UTF-8");
    $bio = htmlspecialchars($_POST["bio"], ENT_QUOTES, "UTF-8");

    if(isset($_POST["privateProfile"]) && $_POST["privateProfile"] == '1') {
        $privateProfile = 1;
    }
    else{
        $privateProfile = 0; 
    }

    include("../classes/config.php");
    include("../classes/Profile.php");
    include("../classes/ProfileContr.php");
    include("../classes/ProfileView.php");

    $profileInfo = new ProfileContr($userId, $usernameU);

    

}

?>