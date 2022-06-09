<?php

require_once "../model/socialQuery.php";
require_once "../persistence/social.php";

class SocialController{

    function update($params){
        $socialQuery = new SocialQuery();
        $social = new Social();
        $social->setFacebook($params['facebook']);
        $social->setTwitter($params['twitter']);
        $social->setInstagram($params['instagram']);
        $social->setLinkedin($params['linkedin']);

        $socialQuery->updateSocialFromUserId($_SESSION['userid'], $social);
    }
}

?>