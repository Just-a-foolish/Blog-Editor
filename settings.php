<?php
define('includable', TRUE);
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>

<!DOCTYPE html>
<html>
    
    <head>
        <title>Configurações</title>
        <meta charset="uft-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/settings.css">
        <script src="js/settings.js"></script>
        <script src="js/utils.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <style type="text/css">
            .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
        </style>
 
    </head>

    <body>
        <?php require "header.php"?>

        <main>
            <div id="page-title">Configurações</div>
            <div id="main-contend">

                <fieldset><legend class="group-setting">Básicas</legend>
                <div id="title-setting">
                    Título do site<br>
                    <input id="input-title" type="text">
                </div>
                <br>
                <div id="about-setting">
                    Descrição do site<br>
                    <textarea id="input-about" type="text"></textarea>
                </div>
                <br>
                <button onclick="saveBasicSettings()">Salvar</button>
                </fieldset>
                <br>

                <fieldset><legend class="group-setting">Redes sociais</legend>
                Insira o link para suas redes sociais<br><br>
                <input id="facebook-input" type="text">
                <label for=facebook>Facebook</label><br>
                <input id="instagram-input" type="text">
                <label for=instagram>Instagram</label><br>
                <input id="twitter-input" type="text">
                <label for=twitter>Twitter</label><br>
                <input id="linkedin-input" type="text">
                <label for=linkedin>Linkedin</label><br>
                <br>
                <button onclick="saveSocialMedia()">Salvar</button>
                </fieldset>
                <br>

                <fieldset><legend class="group-setting">Gerenciar site</legend>
                <div id="delete-site">
                    Excluir site e usuário
                </div>
                </fieldset>
                <br>
                
                
           </div>
        </main>

    </body>
</html>