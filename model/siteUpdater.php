<?php

require_once 'publicationQuery.php';

require_once '../persistence/site.php';

class SiteUpdater{

    public static function update(Site $site){
        $publicationQuery = new PublicationQuery;
        $response = self::$head;

        $result = $publicationQuery->listPublicationsBySiteId($site->getId());
        var_dump($result);
        for($i=0; $i<count($result); $i++){
            $response += "
            <div id=". $result[$i]['publication_id'] ." class='publicacao'>
            <span class='data-publicacao'>". $result[$i]['publication_creationDate'] ."</span>
            <div class='titulo-publicacao'>". $result[$i]['publication_title'] ."</div>;";
            if($result[$i]['publication_image']==1){
                $response += "<img class='imagem-publicacao' src='images/publication/"+ $result[$i]['publication_id'] +".png'>";
            }
            $response += 
            "<p>"+ $result[$i]['publication_text'] +"<p>"+
            "<div class='compartilhe-span'>Compartilhe com:</div>"+
            "<div class='botoes-compartilhar'>"+
            "<img src='images/basic/facebook-button.png'>"+
            "<img src='images/basic/instagram-button.png'>"+
            "<img src='images/basic/twitter-button.png'>"+
            "<img src='images/basic/whatsapp-button.png'>"+
            "</div>"+
            "<hr>";
        }
    }


    //HTML base para montar o site
    private static $head ="
    <head>
    <title>Blog</title>
    <meta charset='uft-8'>
    <meta name='viewport' content='width=devide-width, initial-scale=1.0'>
    <link rel='stylesheet' href='css/stylesheet.css'>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script src='js/index.js'></script>
    <style type='text/css'>
    </style>
    </head>
    <body>
        <header>
            <nav class='navbar'>
                <a class='link-panel' href='../../home.php'>Painel</a>
            </nav>
        </header>
        <main>
            <div class='main-container'>
                <div class='blog-name-h1'>Nome do Blog</div>
                <div id='container-publicacoes' class='container-publicacoes'>";

    private $botton="
        </div>
        </div>   
            </main>   
            <footer class='footer'> 
                
            </footer>

    </body>
    </html>
    ";
}