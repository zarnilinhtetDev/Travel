<?php

session_start();
include "../app/DB.php";
include "../app/Login.php";
$db = new DB();
$connection = $db->connect();
$login = new Login($connection);

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if ($email == "" | $password == "") {
        if ($email == "") {
            $_SESSION['email'] = "Email Must Not Be Empty";
        }
        if ($password == "") {
            $_SESSION['password'] = "Password Must Not Be Empty";
        }
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        $status = $login->check($email, $password);
        if ($status) {
            $_SESSION['auth'] = true;
        } else {
            $_SESSION['status'] = "Email or Password Wrong";
            $_SESSION['expire'] = time();
        }
        header("Location:../views/backend/admin.php");
        // header("Location: ../views/backend/admin.php?page=userlist");
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == "logout") {
        unset($_SESSION['auth']);
        header("Location: ../views/backend/login.php");
    }
}
