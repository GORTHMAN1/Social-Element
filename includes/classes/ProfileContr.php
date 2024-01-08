<?php

class ProfileContr extends Profile {

    private $userId;
    private $username;

    public function __construct ($userId, $username) {
        $this->userId = $userId;
        $this->username = $username;
    }

    public function updateProfileInfo($profileDescription, $profilePicture, $privateProfile, $username) {
        //Error handlers
        if($this->emptyInputCheck($profileDescription, $profilePicture, $privateProfile, $username) == true) {
            header("location: /SocialElement/settings.php?error=emptyinput");
            exit();
        }

        //Update profile info
        $this->setNewProfileInfo($this->userId, $profileDescription, $profilePicture, $privateProfile, $username);
        
    }

    private function emptyInputCheck($profileDescription, $profilePicture, $privateProfile, $username) {
        $result = false;
        if(empty($profileDescription) || empty($profilePhoto) || empty($privateProfile) || empty($username)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

}