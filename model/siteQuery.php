<?php

require_once "connection.php";
require_once "../persistence/user.php";
require_once "../persistence/site.php";

class SiteQuery{

    function insertDefaultSiteFromUser(User $user){
        $conn = new Connection();
        $sql = "INSERT INTO `site` (`site_id`, `site_fk_user_id`, `site_dateCreation`, `site_name`, `site_about`) VALUES (0, ".$user->getId().", now(), 'Meu site', NULL);";
        $conn->insertIntoDB($sql);
    }

    function getSiteByUserId($userId){
        $conn = new Connection();
        $sql = "SELECT * FROM `site` WHERE site_fk_user_id = '".$userId."'";
        $result = $conn->selectFromBD($sql);
        $row = $result->fetch_assoc();

        $site = new Site();
        $site = $this->rowToObject($row);

        return $site;
    }

    function updateSite(Site $site){
        $conn = new Connection();
        $sql = "UPDATE `site` SET site_name='".$site->getName()."', site_about='".$site->getAbout()."' WHERE site_id='".$site->getId()."'";
        $conn->insertIntoDB($sql);
    }

    private function rowToObject($row){
        $site = new Site();
        $site->setId($row["site_id"]);
        $site->setUserId($row["site_fk_user_id"]);
        $site->setCreationDate($row["site_dateCreation"]);
        $site->setName($row["site_name"]);
        $site->setAbout($row["site_about"]);

        return $site;
    }

}

?>