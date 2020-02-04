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
                <div class="nav-item"><a href="upload.php" class="nav-links">Upload</a></div>
                <div class="nav-item"><a href="export.php" class="nav-links">Export</a></div>
                <div class="nav-item"><a href="logout.php" class="nav-links">Logout</a></div>
            </div>
        </div>
        <div class="content__main">
        <div class="action-title"><i class="fas fa-users"></i>&nbsp;My Contacts</div>
            <table>
                <tr>
                    <th class="first">First Name</th>
                    <th>Surname</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Postal Code</th>
                    <th>Birthday</th>
                    <th>Action</th>
                </tr>
                <?php 
                    foreach ($model->getContacts() as $contact) {
                        echo "
                        <tr>
                            <td class='first'>". $contact->getFirstname() ."</td>
                            <td>". $contact->getSurname() ."</td>
                            <td>". $contact->getPhone() ."</td>
                            <td>". $contact->getEmail() ."</td>
                            <td>". $contact->getAddress() ."</td>
                            <td>". $contact->getCity() ."</td>
                            <td>". $contact->getProvince() ."</td>
                            <td>". $contact->getPostal() ."</td>
                            <td>". $contact->getBirthday() ."</td>
                            <td class='actions'>
                                <form method='post' action='../Controller/controller.php'>
                                    <input type='hidden' name='id' value=".$contact->getId().">
                                    <input type='hidden' name='action' value='editPage'>
                                    <button type='submit' class='button'><i class='fas fa-edit'></i></button>
                                </form>
                                <form method='post' action='../Controller/controller.php'>
                                    <input type='hidden' name='id' value=".$contact->getId().">
                                    <input type='hidden' name='action' value='deletePage'>
                                    <button type='submit' class='button'><i class='fas fa-trash'></i></button>
                                </form>
                                <form method='post' action='../Controller/controller.php'>
                                    <input type='hidden' name='id' value=".$contact->getId().">
                                    <input type='hidden' name='action' value='emailIndividual'>
                                    <button type='submit' class='button'><i class='fas fa-mail-bulk'></i></button>
                                </form>
                            </td>
                        </tr>";
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>