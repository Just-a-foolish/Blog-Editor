<?php

class Parameter{

    private $id;
    private $siteId;
    private $creationDate;
    private $modifiedDate;
    private $name;
    private $value;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getSiteId(){
        return $this->siteId;
    }

    public function setSiteId($siteId){
        $this->siteId = $siteId;
        return $this;
    }

    public function getCreationDate(){
        return $this->creationDate;
    }

    public function setCreationDate($creationDate){
        $this->creationDate = $creationDate;
        return $this;
    }

    public function getModifiedDate(){
        return $this->modifiedDate;
    }

    public function setModifiedDate($modifiedDate){
        $this->modifiedDate = $modifiedDate;
        return $this;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
        return $this;
    }

    public function getValue(){
        return $this->value;
    }

    public function setValue($value){
        $this->value = $value;
        return $this;
    }
}

?>