<?php 
require_once '../Models/model.php';
session_start();
if(!isset($_SESSION['auth']) || !isset($_SESSION['user'])) {
	//access denied
	header("Location: login.php");
} else {
    $model = new Model();
    $model->retrieveContacts();
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
                <div class="nav-item"><a class="nav-links disabled">Upload</a></div>
                <div class="nav-item"><a href="export.php" class="nav-links">Export</a></div>
                <div class="nav-item"><a href="login.php" class="nav-links">Logout</a></div>
            </div>
        </div>
        <div class="content__main">
            <div class="action-title"><i class="fas fa-file-upload"></i>&nbsp;Upload Contacts</div>
            <form class="form" method="post" enctype="multipart/form-data" action="../Controller/controller.php">
                <div class="form__section center">Select csv to upload:
                    <label for="fileToUpload" class="choices-options">
                        Browse<input type="file" name="fileToUpload" id="fileToUpload" onchange='getFileData(this)' required hidden>
                    </label>
                </div>
                <div class='form__info__file' id="fileName">No File Selected</div>
                <div class='form__section' style="margin-left: 60px;">
                    <label for="overwrite"><input type="checkbox" name="overwrite" value="yes">&nbsp;Overwrite Database</label>
                </div>
                <div class="form__buttons upload">
                    <input type="hidden" name="action" value="upload">
                    <input type="submit" value="Upload CSV" name="submit" class="form__button">
                    <a href='index.php' class='form__cancel'>Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script>
    function getFileData(object) {
        var file = object.files[0];
        var name = file.name;
        document.getElementById('fileName').innerHTML=name;
    }
</script>
</html>