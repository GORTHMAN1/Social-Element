<?php

class ProfileView extends Profile {

    public function fetchProfileDescription($userId){
        $profileDescription = $this->getProfileInfo($userId);
        
        echo $profileDescription[0]["profile_description"];
    }

    public function fetchProfilePicture($userId){
        $profilePicture = $this->getProfileInfo($userId);
        
        echo $profilePicture[0]["profile_picture"];
    }

    public function fetchProfilePrivate($userId){
        $profilePrivate = $this->getProfileInfo($userId);
        
        echo $profilePrivate[0]["private_profile"];
    }

}