<?php

class User
{
    private $conn;
    public function __construct($connection)
    {
        $this->conn = $connection;
    }
    public function create($username, $email, $password)
    {
        try {

            $state = $this->conn->prepare("INSERT INTO users (username,email,password) VALUE (:username,:email,:password)");
            $state->bindParam("username", $username);
            $state->bindParam('email', $email);
            $state->bindParam('password', $password);
            $state->execute();
            return true;
        } catch (exception $e) {
            //throw $th;
        }
    }
    public function getAll() //show data in userlist
    {
        try {
            $state =  $this->conn->prepare("SELECT * FROM users");
            $state->execute();
            $user =  $state->fetchAll(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            print_r($e);
        }
    }
    public function getID($id) //Show data in Edit form
    {
        try {
            $state = $this->conn->prepare("SELECT * FROM users WHERE id=:id");
            $state->bindParam('id', $id);
            $state->execute();
            $user =  $state->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            print_r($e);
        }
    }
    public function update($id, $username, $email, $password) //Update
    {
        try {
            $state = $this->conn->prepare("UPDATE users SET username=:username,email=:email,password=:password WHERE id=:id");
            $state->bindParam(':username', $username);
            $state->bindParam(':email', $email);
            $state->bindParam(':password', $password);
            $state->bindParam(':id', $id);
            $state->execute();
            return true;
        } catch (PDOException $e) {
            //throw $th;
        }
    }

    public function delete($id)
    {
        try {
            $state = $this->conn->prepare("DELETE FROM users WHERE id=:id");
            $state->bindParam(":id", $id);
            $state->execute();
            return true;
        } catch (PDOException $e) {
            print_r($e);
        }
    }
}
