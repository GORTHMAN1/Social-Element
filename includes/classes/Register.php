<?php

class Register extends Dbh {

    protected function setUser($username, $email, $password, $firstName, 
                                $lastName, $birthday, $profilePicture, $bio){
        $stmt = $this->connect()->prepare(
            'INSERT INTO user(first_name, last_name, birthday, username, 
                            email, password, registered_at, last_login)
             VALUES (?,?,?,?,?,?,?,?);'
        );

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $registered_at = new DateTime();
        $last_login = new DateTime();
        
        // Convert the birthday DateTime object to a string in 'Y-m-d H:i:s' format
        $formattedBirthday = $birthday->format('Y-m-d H:i:s');

        // Convert the registered_at DateTime object to a string in 'Y-m-d H:i:s' format
        $formattedRegisteredAt = $registered_at->format('Y-m-d H:i:s');

        // Convert the last_login DateTime object to a string in 'Y-m-d H:i:s' format
        $formattedLastLogin = $last_login->format('Y-m-d H:i:s');

        if(!$stmt->execute(array($firstName, $lastName, $formattedBirthday, $username, $email, 
                                $hashedPwd, $formattedRegisteredAt, 
                                $formattedLastLogin))){
            $stmt = null;
            header("location: /SocialElement/login.php?error=stmtfailed");
            exit();
        }

        $stmt = null;

        $stmt = $this->connect()->prepare(
            'SELECT user_id
            FROM user
            WHERE username = ?;'
        );

        if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location: /SocialElement/login.php?error=stmtfailed");
            exit();
        }

        $userId = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

        $stmt = $this->connect()->prepare(
            'INSERT INTO user_profile(user_id, profile_description, profile_picture)
            VALUES (?,?,?);'
        );
        
        if(!$stmt->execute(array($userId[0]['user_id'], $bio, $profilePicture))){
            $stmt = null;
            header("location: /SocialElement/login.php?error=stmtfailed");
            exit();
        }
        
        $stmt = null;

    }

    protected function checkUser($username, $email) {
        $stmt = $this->connect()->prepare(
           'SELECT user_id
            FROM user
            WHERE username = ? OR email = ?;'
        );

        if(!$stmt->execute(array($username, $email))) {
            $stmt = null;
            header("location: /SocialElement/login.php?error=stmtfailed");
            exit();
        }

        $resultCheck = false;
        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }
        else {
            $resultCheck = true;
        }

        return $resultCheck;
    }

    protected function getUserId($username){
        $stmt = $this->connect()->prepare(
            'SELECT user_id
            FROM user
            WHERE username = ?;'
        );

        if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location: /SocialElement/profile.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            header("location: /SocialElement/profile.php?error=profilenotfound");
            exit(); 
        }

        $profileData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $profileData;
    }

}

?>