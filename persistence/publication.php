<?php

class Publication{

    private $id;
    private $siteId;
    private $title;
    private $text;
    private $creationDate;
    private $haveImage;
    private $imageId;

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

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function getCreationDate(){
        return $this->creationDate;
    }

    public function setCreationDate($creationDate){
        $this->creationDate = $creationDate;
        return $this;
    }

    public function getHaveImage(){
        return $this->haveImage;
    }

    public function setHaveImage($haveImage){
        $this->haveImage = $haveImage;
        return $this;
    }

    public function getImageId(){
        return $this->imageId;
    }

    public function setImageId($imageId){
        $this->imageId = $imageId;
        return $this;
    }

    public function getText(){
        return $this->text;
    }

    public function setText($text){
        $this->text = $text;
        return $this;
    }
}

?>