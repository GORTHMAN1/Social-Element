<?php

class RegisterContr extends Register{

    private $firstName;
    private $lastName;
    private $birthday;
    private $username;
    private $email;
    private $password;
    private $passwordRepeat;
    private $profilePicture;
    private $bio;

    public function __construct($username, $email, $password, $passwordRepeat, $firstName, $lastName, 
                                    $birthday, $profilePicture, $bio) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->passwordRepeat = $passwordRepeat;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = new DateTime($birthday);
        $this->profilePicture = $profilePicture;
        $this->bio = $bio;
    }

    public function registerUser()
{
    if ($this->emptyInput() == false) {
        return "Please fill all the required fields!";
    }

    if ($this->invalidUsername() == false) {
        return "Username is not valid!";
    }

    if ($this->invalidEmail() == false) {
        return "Email is not valid!";
    }

    if ($this->pwdMatch() == false) {
        return "The passwords you entered do not match!";
    }

    if ($this->usernameTakenCheck() == false) {
        return "Username or email already taken!";
    }

    if ($this->invalidFirstName() == false) {
        return "Invalid first name!";
    }

    if ($this->invalidLastName() == false) {
        return "Invalid last name!";
    }

    if ($this->invalidBirthday() == false) {
        return "You must be 18 to join SE!";
    }

    $this->setUser($this->username, $this->email, $this->password, $this->firstName,
        $this->lastName, $this->birthday, $this->profilePicture, $this->bio);

    return true; // Registration successful
}

    private function emptyInput() {
        $result = true;
        if(
            empty($this->username) || 
            empty($this->password) || 
            empty($this->passwordRepeat) || 
            empty($this->email) ||
            empty($this->firstName) || 
            empty($this->lastName) || 
            empty($this->birthday)
        ) {
            $result = false;
        } 
        else
            $result = true;

        return $result;
    }

    private function invalidUsername() {
        $result = false;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            $result = false;
        }
        else
            $result = true;

        return $result;
    }

    private function invalidEmail() {
        $result = false;
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }
        else
            $result = true;

        return $result;
    }

    private function invalidFirstName() {
        $result = false;
        if(!preg_match("/^[A-Z][a-z]*$/", $this->firstName)) {
            $result = false;
        }
        else
            $result = true;

        return $result;
    }

    private function invalidLastName() {
        $result = false;
        if(!preg_match("/^[A-Z][a-z]*$/", $this->lastName)) {
            $result = false;
        }
        else
            $result = true;

        return $result;
    }

    private function invalidBirthday() {
        $result = false;
        $currentDate = new DateTime();
        $age = $this->birthday->diff($currentDate)->y;
        if($age < 18){
            return false;
        }
        else 
            return true;
    }

    private function pwdMatch() {
        $result = false;
        if($this->password !== $this->passwordRepeat) {
            $result = false;
        }
        else
            $result = true;

        return $result;
    }

    private function usernameTakenCheck() {
        $result = false;
        if(!$this->checkUser($this->username, $this->email)) {
            $result = false;
        }
        else {
            $result = true;
        }

        return $result;
    }

    public function fetchUserId($username){
        $userId = $this->getUserId($username);
        return $userId[0]["user_id"];
    }
}

?>