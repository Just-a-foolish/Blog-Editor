<?php

require_once('../api/router.php');
require_once('../api/index.php');
require_once('../helper/imageHandler.php');

/* Chamada de classes que executam querys */
require_once "../model/publicationQuery.php";
require_once "../model/siteQuery.php";
require_once "../model/userQuery.php";

/* Chamada de classes que instanciam objetos */
require_once "../persistence/publication.php";

class publicationController{

    public function create($params){
        $publicationQuery = new PublicationQuery();
        $siteQuery = new SiteQuery();
        $imageHandler = new ImageHandler();

        $publication = new Publication();
        $site = new Site();
        
        $site = $siteQuery->getSiteByUserId($_SESSION['userid']);
        
        $publication->setTitle($params['title']);
        $publication->setText($params['text']);
        $publication->setSiteId($site->getId());

        if(empty($_FILES['file'])){
            $publication->setHaveImage(false);
        } else {
            $publication->setHaveImage(true);
        }
            
        $errors = $publicationQuery->insertPublication($publication);

        //se existir imagem, copia ela do temp para a pasta do usuário
        if(!empty($_FILES['file'])){
            $destPathImg = "../view/website/".$_SESSION['username']."/images/publication/";
            $publicationID = $publicationQuery->getPublicationLastId();
            $image = $_FILES['file'];
            $image['name'] = $publicationID;
            $errors = $imageHandler->copy($image, $destPathImg);
        }

        //SiteUpdater::update($site);

        if(!empty($erros)){
            return array('errors' => $errors);
        }
    }

    public function delete($params){
        $publicationQuery = new PublicationQuery();

        if(sizeof($params)<=1){
            return "É preciso selecionar ao menos uma publicação";
        }
   
        for($i = 0; $i < sizeof($params)-1; $i++){
            $publicationQuery->deletePublicationById($params[$i]);
        }
    }

    public function update(){

    }

    public function list($params){
        session_start();
        $userQuery = new UserQuery();
        $publicationQuery = new PublicationQuery();
        $siteQuery = new SiteQuery();
        $site = new Site();

        if(!isset($params["sitePath"])){
            $site = $siteQuery->getSiteByUserId($_SESSION['userid']);
            $publications = $publicationQuery->listPublicationsBySiteId($site->getId());

            return $publications;
        } else {
            $user = $userQuery->getUserByUsername($params["sitePath"]);
            $site = $siteQuery->getSiteByUserId($user->getId());
            $publications = $publicationQuery->listPublicationsBySiteId($site->getId());

            return $publications;
        }
    }



}