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
        <title>Publicações</title>
        <meta charset="uft-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/addPublication.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/addPublication.js"></script>
        <script src="js/utils.js"></script>

        <style type="text/css">
            .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
        </style>
 
    </head>

    <body>
        <?php require_once "header.php"?>

        <main>
            <div id="page-title">Adicionar Publicação</div>
            <div id="form">
            <form>
                <label for="title">Título da publicação</label><br>
                <input id= "input-title" type="text">
                <label for="text">Texto</label><br>
                <textarea id= "input-text" type="text"></textarea>
                <label for="img">Imagem (Opcional)</label><br>
                <input type="file" id="img" name="img" accept="image/*"><br>
                <input id="buttonSave" type="button" value="Salvar">
                <a id="buttonCancel" href="publications.php">Cancelar</a>
            </form>
        </main>

    </body>
</html>
