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
        <title>Temas</title>
        <meta charset="uft-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/themes.css">
        <script src="js/themes.js"></script>
        <script src="js/utils.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <style type="text/css">
            .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
        </style>
 
    </head>

    <body>
        <?php require "header.php"?>

        <main>
            <div id="page-title">Temas</div>
            <div id="main-contend">
                <fieldset><legend class="group-theme">Plano de fundo</legend>
                <div id="background-options">
                    <input type="radio" id="solid" name="background-option" value="solid" checked onclick="backgroundRadioUpdate()">
                    <label for="solid">Cor sólida</label>
                    <input type="radio" id="image" name="background-option" value="image" onclick="backgroundRadioUpdate()">
                    <label for="image">Upload de imagem</label>
                </div>
                <br>
                <div id="background-option-solid">
                    <input type="color" id="background-color">
                    <label for="background-color">Selecione a cor desejada</label>
                </div>
                <div id="background-option-image" style="display:none">
                    <label for="background-color">Selecione a imagem desejada</label><br>
                    <input type="file" id="img" name="img" accept="image/*"><br>
                </div>
                <br>
                <button onclick="buttonSaveBackground()">Salvar</button>
                </fieldset>
                <br>

                <fieldset><legend class="group-theme">Fonte</legend>
                <input type="radio" id="arial" name="font-option" value="Arial" checked>
                <label for="arial">Arial</label><br>
                <input type="radio" id="baskerville" name="font-option" value="Baskerville">
                <label for="baskerville">Baskerville</label><br>
                <input type="radio" id="calibri" name="font-option" value="Calibri">
                <label for="calibri">Calibri</label><br>
                <input type="radio" id="courierNew" name="font-option" value="Courier New">
                <label for="courierNew">Courier New</label><br>
                <input type="radio" id="helvetica" name="font-option" value="Helvetica">
                <label for="helvetica">Helvetica</label><br>
                <input type="radio" id="verdana" name="font-option" value="Verdana">
                <label for="verdana">Verdana</label><br><br>
                <button onclick="buttonSaveFont()">Salvar</button>
                </fieldset>
           </div>
        </main>

    </body>
</html>
