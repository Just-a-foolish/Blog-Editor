<?php
if(!defined('includable')) {
   die('Acesso direto não é permitido!');
}
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
?>
<script type="text/javascript" src="js/header.js"></script> 
<script src="js/utils.js"></script>

<header>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="publications.php">Publicações</a></li>
            <li><a href="settings.php">Configurações</a></li>
            <li><a href="themes.php">Temas</a></li>
            <li id="buttonLogout"><a href="">Sair</a></span>
            <li id="linkSite"><a href="../view/website/<?php echo $_SESSION['username']?>">Site</a></span>
        </ul>
    </nav>
</header>
