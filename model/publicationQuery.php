<?php

require_once "connection.php";
require_once "../persistence/publication.php";

class PublicationQuery{

    public function listPublicationsBySiteId($siteId){
        $conn = new Connection;
        $sql = "SELECT * FROM `publication` WHERE publication_fk_site_id = 
        '".$siteId."';";        
        $result = $conn->selectFromBD($sql);
        $response = [];

        while($row = $result->fetch_assoc()) {
            $response[] = $row; 
        }

        return $response;
    }

    public function insertPublication(Publication $publication){

        if(empty($publication->getTitle()) || empty($publication->getText())){
            return "Alguns campos estão vazios";
        }

        $conn = new Connection;
        $sql = "INSERT INTO `publication` (`publication_id`, `publication_fk_site_id`, `publication_title`, `publication_text`, `publication_image`, `publication_creationDate`) VALUES (0, '".$publication->getSiteId()."', '".$publication->getTitle()."', '".$publication->getText()."', '".$publication->getHaveImage()."', now())";
        $conn->insertIntoDB($sql);        
    }

    public function getPublicationLastId(){
        $conn = new Connection;
        $sql = "SELECT MAX(publication_id) FROM publication;";
        $result = $conn->selectFromBD($sql);
        $row = $result->fetch_assoc();

        return $row["MAX(publication_id)"];
    }

    public function deletePublicationById($id){
        $conn = new Connection;
        $sql = "DELETE FROM `publication` WHERE `publication_id`=$id";
        $conn->deleteFromDB($sql);
    }


    private function rowToObject($row){
        $publication = new Publication();
        $publication->setId($row["publication_id"]);
        $publication->setSiteId($row["publication_fk_site_id"]);
        $publication->setTitle($row["publication_title"]);
        $publication->setText($row["publication_text"]);
        $publication->setHaveImage($row["publication_image"]);
        $publication->setCreationDate($row["publication_creationDate"]);

        return $publication;
    }

}