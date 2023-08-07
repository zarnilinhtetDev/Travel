<?php
session_start();
include "../../app/DB.php";
include "../../app/user.php";
include "../../app/post.php";
$db = new DB();
$connection = $db->connect();
$user = new User($connection);
$post = new Post($connection);

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
}
include "./header.php";
include "./sidebar.php";
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if ($page == "adduser") {
        include "./users/adduser.php";
    } else  if ($page == "userlist") {
        $users =  $user->getAll();
        include "./users/userlist.php";
    } else if ($page == "useredit") {
        $id = $_GET['id']; 
        $userData =   $user->getID($id);
        include "./users/useredit.php";
    } else if ($page == "addpost") {
        include "./posts/addpost.php";
    } else {
        if ($page == "postlist") {
            $posts = $post->ShowDataInPostList();
            include "./posts/postlist.php";
        } else if ($page == "postedit") {
            $id = $_GET['id'];
            $postData = $post->ShowDataInPostEdit($id);
            include "./posts/postedit.php";
        }
    }
}


include "./footer.php";
