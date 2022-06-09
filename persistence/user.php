<?php

class User{

    private $id;
    private $email;
    private $username;
    private $name;
    private $password;
    private $accountCreationDate;

    function setId($id){
        $this->id = $id;
    }

    function getId(){
        return $this->id;
    }

    function setEmail($email){
        $this->email = $email;
    }
    
    function getEmail(){
        return $this->email;
    }

    function setUsername($username){
        $this->username = $username;
    }

    function getUsername(){
        return $this->username;
    }

    function setName($name){
        $this->name = $name;
    }

    function getName(){
        return $this->name;
    }

    function setPassword($password){
        $this->password = $password;
    }

    function getPassword(){
        return $this->password;
    }

    function setAccountDateCreation($accountCreationDate){
        $this->accountCreationDate = $accountCreationDate;
    }

    function getAccountDateCreation(){
        return $this->accountCreationDate;
    }

}