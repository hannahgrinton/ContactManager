<?php
require_once '../Models/model.php';
require_once '../Models/webLogin.php';
//declare model
$model = new Model();
//session_start();

if ($_POST['action'] == "editPage") {
    editPage();
} else if ($_POST['action'] == "deletePage") {
    deletePage();
} else if ($_POST['action'] == "edit") {
    edit($model);
} else if ($_POST['action'] == "add") {
    add($model);
} else if ($_POST['action'] == "delete") {
    delete($model);
} else if ($_POST['action'] == "emailPage") {
    emailPage();
} else if ($_POST['action'] == "emailIndividual") {
    emailPage();
} else if ($_POST['action'] == "sendEmail") {
    email($model);
} else if ($_POST['action'] == "login") {
    checkLogin();
}
//check login info
function checkLogin() {
    if ((isset($_POST['username'])) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        login($username, $password);
        
    } else {
        header("Location: ../Views/login.php");
    }
}
//ask model if login works
function login($username, $password) {
    $webLogin = new WebLogin();
    $webLogin->setUsername($username);
    $webLogin->setPassword($password);
    //do I have access?
    if ($webLogin->unlock()) {
        //access granted
        header("Location: ../Views/index.php");
    } else {
        //access denied
        header("Location: ../Views/login.php");
    }
}
//takes you to the edit page
function editPage() {
    header("Location: ../Views/edit.php");
    $_SESSION['id'] = $_POST["id"];
    exit;
}
//completes the editing
function edit($myModel) {
    $model = $myModel;
    $model->retrieveContacts();
    if (isset($_POST['id']) &&
        isset($_POST['firstname']) && 
        isset($_POST['surname']) && 
        isset($_POST['phone']) && 
        isset($_POST['email']) &&
        isset($_POST['address']) &&
        isset($_POST['city']) &&
        isset($_POST['province']) &&
        isset($_POST['postal']) &&
        isset($_POST['birthday'])) {
            $model->editContact($_POST['id'], $_POST['firstname'], $_POST['surname'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['postal'], $_POST['birthday']);
            header("Location: ../Views/index.php");
            exit;
    } else {
        header("Location: ../Views/edit.php");
        exit;
    }
}
//takes you to the delete page
function deletePage() {
    header("Location: ../Views/delete.php");
    $_SESSION['id'] = $_POST["id"];
    exit;
}
//completes the delete
function delete($myModel) {
    $model = $myModel;
    $model->retrieveContacts();
    if (isset($_POST['id'])) {
        $model->deleteContact($_POST['id']);
        header("Location: ../Views/index.php");
        exit;
    }else {
        header("Location: ../Views/edit.php");
        exit;
    }
}
//competes the add
function add($myModel) {
    $model = $myModel;
    if (isset($_POST['firstname']) && 
        isset($_POST['surname']) && 
        isset($_POST['phone']) && 
        isset($_POST['email']) &&
        isset($_POST['address']) &&
        isset($_POST['city']) &&
        isset($_POST['province']) &&
        isset($_POST['postal']) &&
        isset($_POST['birthday'])) {
            $model->createContact(null, $_POST['firstname'], $_POST['surname'], $_POST['phone'], $_POST['email'], $_POST['address'], $_POST['city'], $_POST['province'], $_POST['postal'], $_POST['birthday']);
            header("Location: ../Views/index.php");
            exit;
    } else {
        header("Location: ../Views/add.php");
        exit;
    }
    
}
//takes you to the email page
function emailPage() {
    header("Location: ../Views/email.php");
    if (isset($_POST["id"])) {
        $_SESSION['id'] = $_POST["id"];
    }
    exit;
}
function email($myModel) {
    $model = $myModel;
    if (isset($_POST["emailTo"]) && 
        isset($_POST["emailSubject"]) && 
        isset($_POST["emailMessage"])) {
            $model->sendEmail($_POST['emailTo'], $_POST['emailSubject'], $_POST['emailMessage']);
            header("Location: ../Views/index.php");
            exit;
    }else {
        header("Location: ../Views/email.php");
        exit;
    }
}