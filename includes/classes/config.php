<?php

class Dbh {

    protected function connect() {
        try {
            $username = "root";
            $password = "";
            $dbh = new PDO('mysql:host=localhost; dbname=socialmedia_db', $username, $password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getmessage() . "<br/>";
            die();
        }
    }

}

?>