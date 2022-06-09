<?php

require_once "connection.php";
require_once "../persistence/site.php";

class ParameterQuery{

    function createDefaultParameters(Site $site){
        $conn = new Connection();

        //inserir background option como S (S = Cor sólida, I = Imagem armazenada)
        $sql = "INSERT INTO `parameter` (`parameter_id`, `parameter_fk_site_id`, `parameter_createdDate`, `parameter_modifiedDate`, `parameter_name`, `parameter_value`) VALUES (0, ".$site->getId().", now(), now(), 'backgroundOption', 'S')";
        $conn->insertIntoDB($sql);

        //inserir background imagem name como nula
        $sql = "INSERT INTO `parameter` (`parameter_id`, `parameter_fk_site_id`, `parameter_createdDate`, `parameter_modifiedDate`, `parameter_name`, `parameter_value`) VALUES (0, ".$site->getId().", now(), now(), 'backgroundImageName', 'NULL')";
        $conn->insertIntoDB($sql);

        //inserir background color com #FFFFFF
        $sql = "INSERT INTO `parameter` (`parameter_id`, `parameter_fk_site_id`, `parameter_createdDate`, `parameter_modifiedDate`, `parameter_name`, `parameter_value`) VALUES (0, ".$site->getId().", now(), now(), 'backgroundColorHex', '#FFFFFF')";
        $conn->insertIntoDB($sql);

        //inserir fonte do site como Arial
        $sql = "INSERT INTO `parameter` (`parameter_id`, `parameter_fk_site_id`, `parameter_createdDate`, `parameter_modifiedDate`, `parameter_name`, `parameter_value`) VALUES (0, ".$site->getId().", now(), now(), 'fontOption', 'Arial')";
        $conn->insertIntoDB($sql);
    }

    function setBackgroundColor(Site $site, $hexColor){
        $conn = new Connection();
        $sql = "UPDATE `parameter` SET parameter_value = '".$hexColor."' WHERE parameter_fk_site_id = ".$site->getId()." AND parameter_name='backgroundColorHex'";
        $conn->insertIntoDB($sql);
    }

    function setBackgroundOption(Site $site, $option){
        $conn = new Connection();
        $sql = "UPDATE `parameter` SET parameter_value = '".$option."' WHERE parameter_fk_site_id = ".$site->getId()." AND parameter_name='backgroundOption'";
        $conn->insertIntoDB($sql);
    }

    function setFontOption(Site $site, $option){
        $conn = new Connection();
        $sql = "UPDATE `parameter` SET parameter_value = '".$option."' WHERE parameter_fk_site_id = ".$site->getId()." AND parameter_name='fontOption'";
        $conn->insertIntoDB($sql);
    }

    function getAllParametersFromSite($siteId){
        $conn = new Connection();
        $sql = "SELECT parameter_name, parameter_value FROM `parameter` WHERE parameter_fk_site_id=".$siteId."";
        $result = $conn->selectFromBD($sql);

        return $result;
    }

}


?>