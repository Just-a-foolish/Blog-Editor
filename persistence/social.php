<?php

class Social{

    private $id;
    private $userId;
    private $facebook;
    private $instagram;
    private $twitter;
    private $linkedin;

    function setId($id){
        $this->id = $id;
    }

    function getId(){
        return $this->id;
    }

    function setUserId($userId){
        $this->userId = $userId;
    }

    function getUserId(){
        return $this->userId;
    }

    function setFacebook($facebook){
        $this->facebook = $facebook;
    }

    function getFacebook(){
        return $this->facebook;
    }

    function setInstagram($instagram){
        $this->instagram = $instagram;
    }

    function getInstagram(){
        return $this->instagram;
    }

    function setTwitter($twitter){
        $this->twitter = $twitter;
    }

    function getTwitter(){
        return $this->twitter;
    }

    function setLinkedin($linkedin){
        $this->linkedin = $linkedin;
    }
    
    function getLinkedin(){
        return $this->linkedin;
    }

}

?>