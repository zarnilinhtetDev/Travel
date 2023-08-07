<?php

class Login
{
    private $conn;
    public function __construct($connection)
    {
        $this->conn = $connection;
    }
    public function check($email, $password)
    {
        $state = $this->conn->prepare("SELECT * FROM users WHERE email=:email ");
        $state->bindParam(":email", $email);
        // $state->bindParam(":password", $password);
        $state->execute();
        $result = $state->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $result['password'])) {
            return true;
        } else {
            return false;
        }
        // if ($result == false) {
        //     return false;
        // } else {
        //     return true;
        // }
    }
}
