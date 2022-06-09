<?php

require_once "../model/siteQuery.php";
require_once "../model/userQuery.php";

require_once "../persistence/site.php";


class SiteController{

    function updateBasicSettings($params){
        $siteQuery = new SiteQuery();
        $site = $siteQuery->getSiteByUserId($_SESSION['userid']);

        $site->setName($params['siteName']);
        $site->setAbout($params['siteDescription']);
        $siteQuery->updateSite($site);
    }

    function getSite($params){
        $siteQuery = new SiteQuery();
        $userQuery = new UserQuery();

        $user = $userQuery->getUserByUsername($params['sitePath']);
        $site = $siteQuery->getSiteByUserId($user->getId());

        return array('siteName'=>$site->getName(), 'siteAbout'=>$site->getAbout());
    }
}


?>