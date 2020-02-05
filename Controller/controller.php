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
} else if ($_POST['action'] == "emailIndividual") {
    emailPage($model);
} else if ($_POST['action'] == "emailGroup") {
    emailPage($model);
} else if ($_POST['action'] == "sendEmail") {
    email($model);
} else if ($_POST['action'] == "login") {
    checkLogin();
} else if ($_POST['action'] == "upload") {
    upload($model);
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
    $_SESSION['id'] = $_POST['id'];
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
        header("Location: ../Views/delete.php");
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
function emailPage($myModel) {
    $model = $myModel;
    if (isset($_POST["id"])) {
        $_SESSION['id'] = $_POST["id"];
    } else {
        $model->retrieveContacts();
        $ids = array();
        $birthdays = $model->birthdays();
        foreach($birthdays as $contact) {
            $id = $contact->getId();
            array_push($ids, $id);
        }
        $_SESSION['ids'] = $ids;
    }
    header("Location: ../Views/email.php");
    exit;
}
//completes the email
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
//completes the upload
function upload($myModel) {
    $model = $myModel;
    $csv_mimetypes = array(
        'text/csv',
        'text/plain',
        'application/csv',
        'text/comma-separated-values',
        'application/excel',
        'application/vnd.ms-excel',
        'application/vnd.msexcel',
        'text/anytext',
        'application/octet-stream',
        'application/txt',
    );
    $target_dir = "../Assets/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (in_array($_FILES['fileToUpload']['type'], $csv_mimetypes)) {
        //it's a csv
        $contacts = $model->readContacts($target_file);
        if (isset($_POST['overwrite']) && $_POST['overwrite'] == 'yes') {
            //overwrite database
            $model->rewrite($contacts);
        } else {
            //append to database
            $model->append($contacts);
        }
        header("Location: ../Views/index.php");
    } else {
        //file is not csv
        header("Location: ../Views/upload.php");

    }

}
