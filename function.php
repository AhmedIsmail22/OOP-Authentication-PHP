<?php
session_start();

class Connection{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "authentication";
    public $conn;


    public function __construct(){
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
}



class Register extends Connection {
    public function registration($name, $email, $password, $confirmpassword){
        $duplicate = mysqli_query($this->conn, "SELECT * from users where `name`='$name' OR `email`='$email' OR `password` = '$password'");
        if(mysqli_num_rows($duplicate) > 0){
            return 10;
        }else {
            if($password === $confirmpassword){
                $query = "INSERT into users values('','$name','$email','$password')";
                $result = mysqli_query($this->conn, $query);
                if($result){
                    return 1;
                }
            }else {
                return 100;
            }
        }
        
    }
}




class Login extends Connection{

    public $id ;
    public function login($nameEmail, $password){
        $query = "SELECT * from users where name='$nameEmail' or email = '$nameEmail'";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) == 1){
            if($password === $row['password']){
                $this->id = $row['id'];
                return 1;
            }else {
                return 10;
            }
        }else {
            return 100;
        }
    }

    public function idUser(){
        return $this->id;
    }
}



class Select extends Connection{
    public function selection($id){
        $query = "SELECT * from users where `id`='$id'";
        $result = mysqli_query($this->conn,$query);
        $row = mysqli_fetch_assoc($result);
        if($result)
        return $row['name'];
    }
}