<?php
session_start();
include "../app/DB.php";
include "../app/post.php";
$db = new DB();
$connection = $db->connect();
$post = new Post($connection);

if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    if ($title == "" | $description == "" | $image == " ") {
        if ($title == "") {
            $_SESSION['title'] = "Title must not be empty";
        }
        if ($description == "") {
            $_SESSION['description'] = "Description must be empty";
        }
        if ($image == "") {
            $_SESSION['image'] = "Image must not be empty";
        }

        header("Location:" . $_SERVER["HTTP_REFERER"]);
    } else {
        unset($_SESSION['title']);
        unset($_SESSION['description']);
        unset($_SESSION['image']);
        $tmp_name = $_FILES['image']['tmp_name'];
        $folder = "../assets/posts/";
        $image_Save = uniqid() . $image;
        move_uploaded_file($tmp_name, $folder . $image_Save);

        if ($_POST['action'] == "add") {
            $status = $post->create($title, $description, $image_Save);
            if ($status) {
                $_SESSION['status'] = "Post created Successfully";
                $_SESSION['expire'] = time();
            }
            header("Location:" . $_SERVER['HTTP_REFERER']);
        } else if ($_POST['action'] == "update") {
            $id = $_POST['id'];
            $status = $post->update($id, $title, $description, $image_Save);
            if ($status) {
                $_SESSION['status'] = "Post Update Successfully";
                $_SESSION['expire'] = time();
            }
            header("Location: ../views/backend/admin.php?page=postlist");
        }
    }
}

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $status = $post->delete($id);
        if ($status) {
            // $_SESSION['status'] = "Post Delete Successfully";
            $_SESSION['expire'] = time();
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}
