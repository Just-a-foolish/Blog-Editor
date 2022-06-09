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
        <link rel="stylesheet" href="css/publications.css">
        <script src="js/publications.js"></script>
        <script src="js/utils.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <style type="text/css">
            .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
        </style>
 
    </head>

    <body>
        <?php require "header.php"?>

        <main>
            <div id="page-title">Publicações</div>
            <div id="main-contend">
                <div id="side-options">
                    <button id="add-publication" onclick="window.location.href='addPublication.php'">Adicionar publicação</button>
                    <button id="edit-publication">Editar publicação</button>
                    <button id="delete-publication">Excluir selecionadas</button>
                </div>
                <div id="list-container">
                </div>
           </div>
        </main>

    </body>
</html>
