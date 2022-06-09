<?php

require_once "../model/suggestionQuery.php";

class SuggestionController{

    public function create($params){
        $suggestionQuery = new SuggestionQuery();

        $suggestionQuery->create($params['suggestion'], $_SESSION['userid']);
    }

}