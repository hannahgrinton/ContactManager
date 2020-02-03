<?php
require_once '../Models/model.php';
$model = new Model();
$model->retrieveContacts();
session_start();
//prepare variables to hold data
$ids = array();
$id = null;
$email = null;
$emails = array();
//check session data
if (isset($_SESSION['id'])) {
    //if an id was passed in
    $id =  $_SESSION['id'];
    unset($_SESSION['id']);
    $contact = $model->getContact($id);
    $email = $contact->getEmail();
} else if (isset($_SESSION['ids'])) {
    //if we have an array of ids
    foreach($_SESSION['ids'] as $id) {
        array_push($ids, $id);
    }
    $emails = $model->emailGroup($ids);
    unset($_SESSION['ids']);
} else {
    //we want to email everyone
    $emails = $model->emailAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6d0b9dc65c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../Styles/styles.css" />
    <title>Contact Management</title>
</head>
<body>
    <div class="content">
        <div class="content__head">
            <div class="title">Contact Management</div>
            <div class="nav">
                <div class="nav-item"><a href="add.php" class="nav-links">Add</a></div>
                <div class="nav-item"><a class="nav-links disabled">Email</a></div>
                <div class="nav-item"><a href="birthday.php" class="nav-links">Birthday</a></div>
                <div class="nav-item"><a href="upload.php" class="nav-links">Upload</a></div>
                <div class="nav-item"><a href="export.php" class="nav-links">Export</a></div>
                <div class="nav-item"><a href="logout.php" class="nav-links">Logout</a></div>
            </div>
        </div>
        <div class="content__main">
            <div class="action-title"><i class='fas fa-mail-bulk'></i>&nbsp;Send an Email</div>
        </div>
    </div>
</body>
</html>