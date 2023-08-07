<?php
include "./app/DB.php";
include "./app/post.php";
$db = new DB();
$connection = $db->connect();
$post = new Post($connection);
$posts = $post->ShowDataInPostList();

include "./views/frontend/header.php";
include "./views/frontend/navbar.php";
include "./views/frontend/slider.php";
if (isset($_GET['page'])) {
    $id = $_GET['id'];
    $posts = $post->ShowDataInPostEdit($id);
    include "./views/frontend/detail.php";
} else {
    include "./views/frontend/intro.php";

    include "./views/frontend/content.php";
}

include "./views/frontend/footer.php";
