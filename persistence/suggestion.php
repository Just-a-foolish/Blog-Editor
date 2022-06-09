<?php

class Suggestion{

    private $id;
    private $userId;
    private $text;
    private $date;

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getUserId(){
        return $this->userId;
    }

    function setuserID($userId){
        $this->userId = $userId;
    }

    function getText(){
        return $this->text;
    }

    function setText($text){
        $this->text = $text;
    }

    function getDate(){
        return $this->date;
    }

    function setDate($date){
        $this->date = $date;
    }

}

?>