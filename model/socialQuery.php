<?php

require_once "connection.php";
require_once "../persistence/social.php";

class SocialQuery{

    function insertDefaultSocialFromUser(User $user){
        $conn = new Connection();
        $sql = "INSERT INTO `social` (`social_id`, `social_fk_user_id`, `social_facebook`, `social_instagram`, `social_twitter`, `social_linkedin`) VALUES (0, ".$user->getId().", NULL, NULL, NULL, NULL);";
        $conn->insertIntoDB($sql);
    }

    function updateSocialFromUserId($userId, Social $social){
        $conn = new Connection();
        $sql = "UPDATE `social` SET social_facebook='".$social->getFacebook()."', social_instagram='".$social->getInstagram()."', social_twitter='".$social->getTwitter()."', social_linkedin='".$social->getLinkedin()."' WHERE social_fk_user_id='".$userId."'";
        $conn->insertIntoDB($sql);
    }

}

?>