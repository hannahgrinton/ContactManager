<?php
require_once '../Models/model.php';
session_start();
$contact = null;
if(!isset($_SESSION['auth']) || !isset($_SESSION['user'])) {
	//access denied
	header("Location: login.php");
} else {
    $model = new Model();
    $model->retrieveContacts();
    if(isset($_SESSION['id'])){
        $contact = $model->getContact($_SESSION['id']);
        unset($_SESSION['id']);
    }
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
                <div class="nav-item"><a href="email.php" class="nav-links">Email</a></div>
                <div class="nav-item"><a href="birthday.php" class="nav-links">Birthday</a></div>
                <div class="nav-item"><a href="upload.php" class="nav-links">Upload</a></div>
                <div class="nav-item"><a href="export.php" class="nav-links">Export</a></div>
                <div class="nav-item"><a href="login.php" class="nav-links">Logout</a></div>
            </div>
        </div>
        <div class="content__main">
            <div class="action-title"><i class="fas fa-user-minus"></i>&nbsp;Delete Contact</div>
            <form method="post" action="../Controller/controller.php" class="form">
                <?php 
                echo "
                <div class='prompt'>Are you sure you wish to delete this contact?</div>
                <div class='contact-info'>".$contact->getFirstname()." ".$contact->getSurname()."</div>
                <div class='form__buttons'>
                    <input type='hidden' name='id' value='".$contact->getId()."'>
                    <input type='hidden' name='action' value='delete'>
                    <input type='submit' value='Delete' class='form__button'>
                    <a href='index.php' class='form__cancel'>Cancel</a>
                </div>
                " ?>
            </form>
        </div>
    </div>
</body>
</html>