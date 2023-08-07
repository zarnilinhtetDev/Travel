<?php


session_start();

include "../app/DB.php";
include "../app/user.php";
$db = new DB();
$connects = $db->connect();
$user = new User($connects);


if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($username == "" | $email == "" | $password == " ") {
        if ($username == "") {
            $_SESSION['username'] = "User Name must not be empty";
        }
        if ($email == "") {
            $_SESSION['email'] = "Email must be empty";
        }
        if ($password == "") {
            $_SESSION['password'] = "Password must not be empty";
        }

        header("Location:" . $_SERVER["HTTP_REFERER"]);
    } else {
        unset($_SESSION['username']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        $passcrypt = password_hash($password, PASSWORD_BCRYPT);
        if ($_POST['action'] == 'add') {
            $status =   $user->create($username, $email, $passcrypt);
            if ($status) {
                $_SESSION['status'] = "User Created Successfully";
                $_SESSION['expire'] = time();
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else if ($_POST['action'] == 'update') {
            $id = $_POST['id'];
            $status = $user->update($id, $username, $email, $passcrypt);
            if ($status) {
                $_SESSION['$status'] = "User Update Successfully";
                $_SESSION['expire'] = time();
            }
        }
        header("Location: ../views/backend/admin.php?page=userlist");
    }
}

if (isset($_GET['action'])) {
    if ($_GET['delete'] == "") {
        $id = $_GET['id'];
        $status = $user->delete($id);
        if ($status) {
            $_SESSION['status'] = "User Delete Successfully";
            $_SESSION['expire'] = time();
        }
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
}
