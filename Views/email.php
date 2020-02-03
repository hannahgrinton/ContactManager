<?php
require_once '../Models/model.php';
$model = new Model();
$model->retrieveContacts();
session_start();
$ids = array();
if(isset($_SESSION['ids'])){
    foreach($_SESSION['ids'] as $id) {
        array_push($ids, $id);
    }
    unset($_SESSION['ids']);
}
$id = null;
if(isset($_SESSION['id'])) {
    $id =  $_SESSION['id'];
    unset($_SESSION['id']);
}
?>