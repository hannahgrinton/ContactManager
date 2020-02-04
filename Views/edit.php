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
                <div class="nav-item"><a href="logout.php" class="nav-links">Logout</a></div>
            </div>
        </div>
        <div class="content__main">
            <div class="action-title"><i class="fas fa-user-edit"></i>&nbsp;Edit Contact</div>
            <form method="post" action="../Controller/controller.php" class="form">
                <?php 
                echo "
                <div class='form__section'>
                    <label for='firstname'>First Name:</label>
                    <input type='text' name='firstname' value='".$contact->getFirstname()."' maxlength='20' class='input input__text shorter' required>
                </div>
                <div class='form__section'>
                    <label for='surname'>Surname:</label>
                    <input type='text' name='surname' value='".$contact->getSurname()."' maxlength='20' class='input input__text shorter' required>
                </div>
                <div class='form__section'>
                    <label for='phone'>Phone:</label>
                    <input type='text' name='phone' value='".$contact->getPhone()."' maxlength='15' class='input input__phone' required>
                </div>
                <div class='form__section'>
                    <label for='email'>Email:</label>
                    <input type='text' name='email' value='".$contact->getEmail()."' maxlength='40' class='input input__email' required>
                </div>
                <div class='form__section'>
                    <label for='address'>Address:</label>
                    <input type='text' name='address' value='".$contact->getAddress()."' maxlength='40' class='input input__text' required>
                </div>
                <div class='form__section'>
                    <label for='city'>City:</label>
                    <input type='text' name='city' value='".$contact->getCity()."' maxlength='20' class='input input__text shorter' required>
                </div>
                <div class='form__section'>
                    <label for='province'>Province:</label>
                    <input type='text' name='province' value='".$contact->getProvince()."' maxlength='3' class='input input__short' required>
                </div>
                <div class='form__section'>
                    <label for='postal'>Postal:</label>
                    <input type='text' name='postal' value='".$contact->getPostal()."' maxlength='7' class='input input__text shorter' required>
                </div>
                <div class='form__section'>
                    <label for='birthday'>Birthday:</label>
                    <input type='date' name='birthday' value='".$contact->getBirthday()."' maxlength='10' class='input input__date' required>
                </div>
                <div class='form__buttons'>
                    <input type='hidden' name='id' value='".$contact->getId()."'>
                    <input type='hidden' name='action' value='edit'>
                    <input type='submit' value='Edit' class='form__button'>
                    <a href='index.php' class='form__cancel'>Cancel</a>
                </div>
                " ?>
            </form>
        </div>
    </div>
</body>
</html>