<?php

require_once('../api/router.php');
require_once('../api/index.php');
require_once('../helper/imageHandler.php');

require_once "../persistence/site.php";

require_once "../model/siteQuery.php";
require_once "../model/parameterQuery.php";
require_once "../model/userQuery.php";

class ThemesController{

    public function updateBackground($params){
        $siteQuery = new SiteQuery();
        $parameterQuery = new ParameterQuery();
        $imageHandler = new ImageHandler();

        $site = $siteQuery->getSiteByUserId($_SESSION["userid"]);


        if($params['option']=="solid"){
            $parameterQuery->setBackgroundOption($site, "S");
            $hex=$params['hexColor'];
            $parameterQuery->setBackgroundColor($site, $hex);

        } else if ($params['option']=="image"){
            if(!empty($_FILES['file'])){
                $parameterQuery->setBackgroundOption($site, "I");
                $destPathImg = "../view/website/".$_SESSION['username']."/images/background/";
                $image = $_FILES['file'];
                $image['name'] = "backgroundImage";
                $errors = $imageHandler->copy($image, $destPathImg);
            }
        }

        if(!empty($erros)){
            return array('errors' => $errors);
        }
    }

    public function updateFont($params){
        $siteQuery = new SiteQuery();
        $parameterQuery = new ParameterQuery();

        $site = $siteQuery->getSiteByUserId($_SESSION["userid"]);
        $parameterQuery->setFontOption($site, $params['fontOption']);
    }
    
    public function getTheme($params){
        $siteQuery = new SiteQuery();
        $parameterQuery = new ParameterQuery();
        $userQuery = new UserQuery();

        $user = $userQuery->getUserByUsername($params['sitePath']);
        $site = $siteQuery->getSiteByUserId($user->getId());
        $resultQuery = $parameterQuery->getAllParametersFromSite($site->getId());
        $result = array();
        while($row = $resultQuery->fetch_assoc()) {
            $result = array_merge_recursive($row, $result);
          }
        return $result;
        }
}

?>