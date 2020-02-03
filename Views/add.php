<?php
require_once '../Models/model.php';
$model = new Model();
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
            <div class="action-title"><i class="fas fa-user-plus"></i>&nbsp;Add Contact</div>
            <form method="post" action="../Controller/controller.php" class="form">
                <div class='form__section'>
                    <label for='firstname'>First Name:</label>
                    <input type='text' name='firstname' maxlength='20' class='input input__text shorter' required>
                </div>
                <div class='form__section'>
                    <label for='surname'>Surname:</label>
                    <input type='text' name='surname' maxlength='20' class='input input__text shorter' required>
                </div>
                <div class='form__section'>
                    <label for='phone'>Phone:</label>
                    <input type='text' name='phone' maxlength='15' class='input input__phone' required>
                </div>
                <div class='form__section'>
                    <label for='email'>Email:</label>
                    <input type='text' name='email' maxlength='40' class='input input__email' required>
                </div>
                <div class='form__section'>
                    <label for='address'>Address:</label>
                    <input type='text' name='address' maxlength='40' class='input input__text' required>
                </div>
                <div class='form__section'>
                    <label for='city'>City:</label>
                    <input type='text' name='city' maxlength='20' class='input input__text shorter' required>
                </div>
                <div class='form__section'>
                    <label for='province'>Province:</label>
                    <input type='text' name='province' maxlength='3' class='input input__short' required>
                </div>
                <div class='form__section'>
                    <label for='postal'>Postal:</label>
                    <input type='text' name='postal' maxlength='7' class='input input__text shorter' required>
                </div>
                <div class='form__section'>
                    <label for='birthday'>Birthday:</label>
                    <input type='date' name='birthday' maxlength='10' class='input input__date' required>
                </div>
                <div class='form__buttons'>
                    <input type='hidden' name='action' value='add'>
                    <input type='submit' value='Add' class='form__button'>
                    <a href='index.php' class='form__cancel'>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>