<?php
require_once 'contact.php';
require_once 'dbConnect.php';

class Model {
    //private variables
    private $contacts = array(); //contacts from db
    private $csvContacts = array(); //contacts from csv
    //contructor
    public function __construct() {}
    //-------------------------------------------- gets / sets
    public function getContacts() {
        return $this->contacts;
    }
    public function getCsvContacts() {
        return $this->csvContacts;
    }
    public function getContact($id) {
        foreach($this->contacts as $contact) {
            if ($id == $contact->getId()) {
                return $contact;
            }
        }
    }
    //-------------------------------------------- public methods
    //create contact based on user input
    public function createContact($id, $myFirstname, $mySurname, $myPhone, $myEmail, $myAddress, $myCity, $myProvince, $myPostal, $myBirthday) {
        $contact = new Contact($id, $myFirstname, $mySurname, $myPhone, $myEmail, $myAddress, $myCity, $myProvince, $myPostal, $myBirthday);
        $this->sendContact($contact);
        $this->retrieveContacts();
    }
    //delete contact based on user input
    public function deleteContact($id) {
        $contact = $this->getContact($id);
        $this->delete($contact);
    }
    //edit contact based on user input
    public function editContact($id, $myFirstname, $mySurname, $myPhone, $myEmail, $myAddress, $myCity, $myProvince, $myPostal, $myBirthday) {
        $contact = $this->getContact($id);
        $contact->setFirstname($myFirstname);
        $contact->setSurname($mySurname);
        $contact->setPhone($myPhone);
        $contact->setEmail($myEmail);
        $contact->setAddress($myAddress);
        $contact->setCity($myCity);
        $contact->setProvince($myProvince);
        $contact->setPostal($myPostal);
        $contact->setBirthday($myBirthday);
        $this->edit($contact);
    }
    //returns a list of all contacts with a birthday in the current month
    public function birthdays() {
        $birthdays = array();
        foreach($this->contacts as $contact) {
            $birthday = DateTime::createFromFormat('!m', $contact->birthdayMonth());
            $birthday = $birthday->format('F');
            if ($birthday == $this->currentMonth()) {
                array_push($birthdays, $contact);
            }
        }
        return $birthdays;
    }
    //returns name of current month
    public function currentMonth() {
        $monthNum  = date("m");
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('F');
        return $monthName;
    }
    //read csv contacts and put in array
    public function readContacts() {
        $this->csvContacts = array();
        $file = fopen("clientInfo.csv","r");
        while(! feof($file)) {
            $info = fgetcsv($file);
            $firstname = $info[0];
            $surname = $info[1];
            $phone = $info[2];
            $email = $info[3];
            $address = $info[4];
            $city = $info[5];
            $province = $info[6];
            $postal = $info[7];
            $birthday = $info[8];
            $contact = new Contact(null, $firstname, $surname, $phone, $email, $address, $city, $province, $postal, $birthday);
            array_push($this->csvContacts, $contact);
        }
        fclose($file);
    }
    //write contacts from db to csv
    public function writeContacts() {
        $file = fopen("clientInfo.csv","w");
        //write to file
        fputcsv($file, $this->contacts, ",");
        //close file
        fclose($file);
    }
    //retrieve contacts from db
    public function retrieveContacts() {
        $this->contacts = array();
        $table_name = "tblContacts";
        $connection = db_connect();
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $sql = "SELECT * FROM $table_name ORDER BY id";
        $result = @mysqli_query($connection, $sql) or die(mysqli_error($connection));
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $firstname = $row['firstname'];
            $surname = $row['surname'];
            $phone = $row['phone'];
            $email = $row['email'];
            $address = $row['address'];
            $city = $row['city'];
            $province = $row['province'];
            $postal = $row['postal'];
            $birthday = $row['birthday'];
            $contact = new Contact($id, $firstname, $surname, $phone, $email, $address, $city, $province, $postal, $birthday);
            array_push($this->contacts, $contact);
        }
    }
    //append list of contacts
    public function append($myContacts) {
        foreach ($myContacts as $contact) {
            $this->sendContact($contact);
        }
    }
    //upload entire contact list to db
    public function rewrite($myContacts) {
        $this->empty();
        foreach($this->contacts as $contact) {
            sendContact($contact);
        }
    }
    //-------------------------------------------- private methods
    //send newly created contact to db
    private function sendContact($myContact) {
        $table_name = "tblContacts";
        $connection = db_connect();
        //try connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        //prepare statement
        if (!($sql = $connection->prepare("INSERT INTO $table_name (id, firstname, surname, phone, email, address, city, province, postal, birthday) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        //set variables
        $id = null;
        $firstname = $myContact->getFirstname();
        $surname = $myContact->getSurname();
        $phone = $myContact->getPhone();
        $email = $myContact->getEmail();
        $address = $myContact->getAddress();
        $city = $myContact->getCity();
        $province = $myContact->getProvince();
        $postal = $myContact->getPostal();
        $birthday = $myContact->getBirthday();
        //bind variables
        if (!($sql->bind_param("isssssssss", $id, $firstname, $surname, $phone, $email, $address, $city, $province, $postal, $birthday))) {
            echo "Binding parameters failed: (" . $sql->errno . ") " . $sql->error;
        }
        //run query
        if (!$sql->execute()) {
            echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
        }
        //close
        $sql->close();
    }
    //tell db to delete user selected contact
    private function delete($myContact) {
        $table_name = "tblContacts";
        $connection = db_connect();
        //try connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        //prepare statement
        if (!($sql = $connection->prepare("DELETE FROM $table_name WHERE id=?"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        //set variables
        $id = $myContact->getId();
        //bind variables
        if (!($sql->bind_param("i", $id))) {
            echo "Binding parameters failed: (" . $sql->errno . ") " . $sql->error;
        }
        //run query
        if (!$sql->execute()) {
            echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
        }
        //close
        $sql->close();
    }
    //tell db to make user-made edits to a contact
    private function edit($myContact) {
        $table_name = "tblContacts";
        $connection = db_connect();
        //try connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        //prepare statement
        if (!($sql = $connection->prepare("UPDATE $table_name SET firstname=?, surname=?, phone=?, email=?, address=?, city=?, province=?, postal=?, birthday=? WHERE id=?"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        //set variables
        $id = $myContact->getId();
        $firstname = $myContact->getFirstname();
        $surname = $myContact->getSurname();
        $phone = $myContact->getPhone();
        $email = $myContact->getEmail();
        $address = $myContact->getAddress();
        $city = $myContact->getCity();
        $province = $myContact->getProvince();
        $postal = $myContact->getPostal();
        $birthday = $myContact->getBirthday();
        //bind variables
        if (!($sql->bind_param("sssssssssi", $firstname, $surname, $phone, $email, $address, $city, $province, $postal, $birthday, $id))) {
            echo "Binding parameters failed: (" . $sql->errno . ") " . $sql->error;
        }
        //run query
        if (!$sql->execute()) {
            echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
        }
        //close
        $sql->close();
    }
    //empty out database table
    private function empty() {
        $table_name = "tblContacts";
        $connection = db_connect();
        //try connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        //execute sql
        $sql = "TRUNCATE TABLE $table_name";
        $result = @mysqli_query($connection, $sql) or die(mysqli_error($connection));
    }

    
}