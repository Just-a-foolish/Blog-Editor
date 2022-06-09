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
        <title>Painel</title>
        <meta charset="uft-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/home.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/footer.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="js/home.js"></script>
        <script src="js/utils.js"></script>
        <style type="text/css">
            .hide { position:absolute; top:-1px; left:-1px; width:1px; height:1px; }
        </style>
 
    </head>

    <body>
        <?php require "header.php"?>

        <main>
            <div id="welcome">Bem vindo <?php echo $_SESSION['username'] ?>!</div>
            <div id="suggestion">
                Gostariamos de ter seu feedback ou sugestão de melhoria!<br>
                <textarea id= "input-suggestion" type="text"></textarea><br>
                <button type="button" onclick="sendSuggestion()">Enviar</button> 
            </div>
        </main>

        <?php require "footer.php"?>
    </body>
</html>
