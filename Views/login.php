<?php 
session_start();
if(isset($_SESSION['auth']) || isset($_SESSION['user'])) {
    unset($_SESSION['auth']);
    unset($_SESSION['user']);
	session_unset();
    // Destroy the session.
    session_destroy();
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
        </div>
        <div class="content__main">
            <div class="action-title"><i class="fas fa-sign-in-alt"></i>&nbsp;Login</div><br>
            <form method="post" action="../Controller/controller.php">
                <div class='form__section'>
                    <label for='username'>Username:</label>&nbsp;&nbsp;
                    <input type='text' name='username' class='input' max-length="20" required>
                </div>
                <div class='form__section'>
                    <label for='password'>Password:</label>&nbsp;&nbsp;
                    <input type='password' name='password' class='input' max-length="20" required>
                </div>
                <div class='form__buttons'>
                    <input type='hidden' name='action' value='login'>
                    <input type='submit' value='Login' class='form__button'>
                </div>
            <form>
        </div>
    </div>
</body>
</html>