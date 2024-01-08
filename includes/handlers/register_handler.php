<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Grabbing the data
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');
    $confirmPassword = htmlspecialchars($_POST["confirmPassword"], ENT_QUOTES, 'UTF-8');

    $firstName = htmlspecialchars($_POST["firstName"], ENT_QUOTES, 'UTF-8');
    $lastName = htmlspecialchars($_POST["lastName"], ENT_QUOTES, 'UTF-8');
    $birthday = htmlspecialchars($_POST["birthday"], ENT_QUOTES, 'UTF-8');

    // Handle optional fields
    $profilePicture = isset($_FILES['profilePicture']) ? $_FILES['profilePicture'] : "not_set";
    $bio = isset($_POST['bio']) ? $_POST['bio'] : null;

    // Instantiate RegisterContr class
    include "../classes/config.php";
    include "../classes/Register.php";
    include "../classes/RegisterContr.php";

    $register = new RegisterContr($username, $email, $password, $confirmPassword, $firstName, $lastName, 
                                    $birthday, $profilePicture, $bio);
    
    // Running error handlers and user register
    $result = $register->registerUser();

    if ($result !== true) {
        // Registration failed, redirect to register page with error message
        header("location: /SocialElement/register.php?error=" . urlencode($result));
        exit();
    } else {
        // Registration successful, redirect to login page
        header("location: /SocialElement/login.php?error=none");
        exit();
    }

    // Handle additional data (profile picture, bio, etc.)
    //$register->updateUserProfile($firstName, $lastName, $birthday, $profilePicture, $bio);

    $userId = $signup->fetchUserId($username);

    //Instantiate ProfileContr class
    include "../classes/Profile.php";
    include "../classes/ProfileContr.php";
    $profile = new ProfileContr($userId, $username);

    // Going back to the frontpage
    header("location: /SocialElement/login.php?error=none");
}

?>
