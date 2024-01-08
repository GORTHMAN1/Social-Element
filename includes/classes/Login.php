<?php

class Login extends Dbh {

    protected function getUser($username, $password){

        $stmt = $this->connect()->prepare(
            'SELECT password
             FROM user
             WHERE username = ? OR email = ?;'
        );

        if(!$stmt->execute(array($username, $username))){
            $stmt = null;
            $_SESSION["error"] = "An error occurred during login. Please try again.";
            header("location: /SocialElement/login.php?error=stmtfailed");
            exit();
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(empty($result)){
            $stmt = null;
            $_SESSION["error"] = "User not found.";
            header("location: /SocialElement/login.php?error=usernotfound");
            exit();
        }

        $pwdHashed = $result[0]["password"];
        $checkPwd = password_verify($password, $pwdHashed);

        if($checkPwd == false){
            $stmt = null;
            $_SESSION["error"] = "Wrong username or password.";
            header("location: /SocialElement/login.php?error=wrongpassword");
            exit();
        }
        elseif($checkPwd == true){
            $stmt = $this->connect()->prepare(
                'SELECT *
                 FROM user
                 WHERE username = ? OR email = ? AND password = ?;'
            );

            if(!$stmt->execute(array($username, $username, $pwdHashed))){
                $stmt = null;
                header("location: /SocialElement/login.php?error=stmtfailed");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(empty($user)){
                $stmt = null;
                header("location: /SocialElement/login.php?error=usernotfound");
                exit();
            }

            session_start();

            $_SESSION["userid"] = $user[0]["user_id"];
            $_SESSION["firstName"] = $user[0]["first_name"];
            $_SESSION["lastName"] = $user[0]["last_name"];
            $_SESSION["username"] = $user[0]["username"];
            $_SESSION["email"] = $user[0]["email"];

            // Reset the error message if login is successful
            $_SESSION["error"] = "";

            $stmt = null;
        }

        $stmt = null;
    }
}
?>
