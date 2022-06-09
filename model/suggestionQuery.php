<?php

require_once "connection.php";
require_once "../persistence/suggestion.php";

class SuggestionQuery{

    public function create($suggestion, $userId){
        $conn = new Connection();
       $sql = "INSERT INTO `suggestion` (`suggestion_id`, `suggestion_fk_user_id`, `suggestion_text`, `suggestion_date`) VALUES (0, ".$userId.", '".$suggestion."', now())";
        $conn->insertIntoDB($sql);
    }

}