<?php

class Post
{
    private $conn;
    public function __construct($connection)
    {
        $this->conn = $connection;
    }
    public function create($title, $description, $image)
    {
        try {

            $state = $this->conn->prepare("INSERT INTO posts (title,description,image) VALUES (:title,:description,:image)");
            $state->bindParam("title", $title);
            $state->bindParam("description", $description);
            $state->bindParam("image", $image);
            $state->execute();
            return true;
        } catch (PDOException $e) {
            print_r($e);
        }
    }

    public function ShowDataInPostList()
    {
        try {
            $state = $this->conn->prepare("SELECT * FROM posts");
            $state->execute();
            $post = $state->fetchAll(PDO::FETCH_ASSOC);
            return $post;
        } catch (PDOException $e) {
            print_r($e);
        }
    }

    public function ShowDataInPostEdit($id)
    {
        try {
            $state = $this->conn->prepare("SELECT * FROM posts WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            $post = $state->fetch(PDO::FETCH_ASSOC);
            return $post;
        } catch (PDOException $e) {
            print_r($e);
        }
    }

    public function update($id, $title, $description, $image)
    {
        try {
            $state = $this->conn->prepare("UPDATE posts SET title=:title,description=:description,image=:image WHERE id=:id ");
            $state->bindParam(":title", $title);
            $state->bindParam(":description", $description);
            $state->bindParam(":image", $image);
            $state->bindParam("id", $id);
            $state->execute();
            return true;
        } catch (PDOException $e) {
            print_r($e);
        }
    }

    public function delete($id)
    {
        try {
            $state = $this->conn->prepare("DELETE FROM posts WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            return true;
        } catch (PDOException $e) {
            print_r($e);
        }
    }
}
