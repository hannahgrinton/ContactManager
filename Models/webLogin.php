<?php
require_once('dbConnect.php');
session_start();
class WebLogin {
    //private variables
    private $username;
    private $password;
    private $access;
    //------------------------------------------ constructor
    public function __construct() {
        $this->username = "";
        $this->password = "";
        $this->access = false;
    }
    //------------------------------------------ gets / sets
    public function setUsername($value) {
        $this->username = ($value == null ? "" : $value);
    }
    public function setPassword($value) {
        $this->password = ($value == null ? "" : $value);
    }
    public function getAccess() {
        return $this->access;
    }
    //------------------------------------------ public methods
    public function connect() {
        $connection = db_connect();
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
    public function unlock() {
        //assume no access
        $this->access = false;
        //server side validation
        $this->username = substr($this->username, 0, 10);
        $this->password = substr($this->password, 0, 10);
        //connect
        $connection = $this->connect();
        $table_name = "tblLogin";
        //prepare
        if (!($sql = $connection->prepare("SELECT password FROM $table_name WHERE username=?"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        //bind
        if (!($sql->bind_param("s", $this->username))) {
            echo "Binding parameters failed: (" . $sql->errno . ") " . $sql->error;
        }
        //run query
        if (!$sql->execute()) {
            echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
        }
        $sql->bind_result($password);
        $sql->fetch();
        //does it exist?
        if ($password != "" || $password != null) {
            //yes it exists
            //does it match? test user entered password against db hash value
            if (password_verify($this->password, $password)) {
                //hashed password matches what is in db
                echo "i have access";
                $this->access = true;
                $_SESSION['auth'] = "true";
                $_SESSION['user'] = $this->username;
            } else {
                //no match
                echo "no access";
                $this->access = false;
                session_unset();
                // Destroy the session.
                session_destroy();
            }
        } else {
            //doesn't exist
            $this->access = false;
            session_unset();
            // Destroy the session.
            session_destroy();
        }
        //close
        $sql->close();
        return $this->access;
    }
    public function addUser() {
        if (strlen($this->password) < 8 ) {
            //check to make sure the password is long enough
            echo "Password is too short! must be at least 8 characters long";
        } else if (!ctype_alnum($this->password)) {
            //check if it's alphanumeric
            echo "Password must be alphanumeric";
        } else if (($this->username == "") || (empty($this->username))) {
            //check that they entered a username
            echo "A username must be entered";
        } else {
            //all is good!
            $this->username = substr($this->username, 0, 10);
            $this->password = substr($this->password, 0, 10);
            $hashedPassword = $this->getHashed($this->password);
            echo $hashedPassword;
            $this->userAdd($hashedPassword);
        }
    }
    //------------------------------------------ private methods
    private function getHashed($myPassword) {
        //returns hashed password
        $hash = password_hash($myPassword, PASSWORD_DEFAULT);
        return $hash;
    }
    private function userAdd($hashedPassword) {
        //adds new user to the database
        $connection = $this->connect();
        $table_name = "tblLogin";
        //prepare
        if (!($sql = $connection->prepare("INSERT INTO $table_name (id, username, password) VALUES (null, ?, ?)"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        //bind
        if (!($sql->bind_param("ss", $this->username, $hashedPassword))) {
            echo "Binding parameters failed: (" . $sql->errno . ") " . $sql->error;
        }
        //run query
        if (!$sql->execute()) {
            echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
        }
        $sql->close();
    }
}
// $test = new WebLogin();
// $test->setUsername("test");
// $test->setPassword("password");
// $test->addUser();
