<?php

class Contact {
    //private variables
    private $firstname = "";
    private $surname = "";
    private $phone = "";
    private $email = "";
    private $address = "";
    private $city = "";
    private $province = "";
    private $postal = "";
    private $birthday = "";
    private $id = null;
    //constructor
    public function __construct($myId, $myFirstname, $mySurname, $myPhone, $myEmail, $myAddress, $myCity, $myProvince, $myPostal, $myBirthday) {
        $this->id = $myId;
        $this->firstname = $myFirstname;
        $this->surname = $mySurname;
        $this->phone = $myPhone;
        $this->email = $myEmail;
        $this->address = $myAddress;
        $this->city = $myCity;
        $this->province = $myProvince;
        $this->postal = $myPostal;
        $this->birthday = $myBirthday;
    }
    //------------------------------------------------ gets / sets
    public function getId() {
        return $this->id;
    }
    public function getFirstname() {
        return $this->firstname;
    }
    public function setFirstname($myFirstname) {
        $this->firstname = $myFirstname;
    }
    public function getSurname() {
        return $this->surname;
    }
    public function setSurname($mySurname) {
        $this->surname = $mySurname;
    }
    public function getPhone() {
        return $this->phone;
    }
    public function setPhone($myPhone) {
        $this->phone = $myPhone;
    }
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($myEmail) {
        $this->email = $myEmail;
    }
    public function getAddress() {
        return $this->address;
    }
    public function setAddress($myAddress) {
        $this->address = $myAddress;
    }
    public function getCity() {
        return $this->city;
    }
    public function setCity($myCity) {
        $this->city = $myCity;
    }
    public function getProvince() {
        return $this->province;
    }
    public function setProvince($myProvince) {
        $this->province = $myProvince;
    }
    public function getPostal() {
        return $this->postal;
    }
    public function setPostal($myPostal) {
        $this->postal = $myPostal;
    }
    public function getBirthday() {
        return $this->birthday;
    }
    public function setBirthday($myBirthday) {
        $this->birthday = $myBirthday;
    }
    //------------------------------------------------ public methods
    public function delete() {
        $this->firstname = "";
        $this->surname = "";
        $this->phone = "";
        $this->email = "";
        $this->address = "";
        $this->city = "";
        $this->province = "";
        $this->postal = "";
        $this->birthday = "";
        $this->int = null;
    }
    public function sendEmail() {

    }
    public function birthdayMonth() {
        $month = date('m', strtotime($this->birthday));
        return $month;
    }
    //------------------------------------------------ private methods
   
}