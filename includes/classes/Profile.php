<?php

class Profile extends Dbh {

    protected function getProfileInfo($userId){
        $stmt = $this->connect()->prepare('SELECT * FROM user_profile WHERE user_id = ?;');

        if (!$stmt->execute(array($userId))) {
            $stmt = null;
            header("location: /SocialElement/profile.php?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            // header("location: /SocialElement/profile.php?error=profilenotfound");
            echo "Profile not found for user: " . $userId;
            exit();
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }

    protected function setNewProfileInfo($userId, $profileDescription, $profilePicture, $privateProfile, $username){
        $stmt = $this->connect()->prepare(
            'UPDATE user_profile
            SET profile_description = ?, profile_picture = ?, private_profile = ?
            WHERE user_id = ?;');

        if (!$stmt->execute(array($profileDescription, $profilePicture, $privateProfile, $userId))) {
            $stmt = null;
            header("location: /SocialElement/profile.php?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

}