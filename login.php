<!DOCTYPE html>
<html>
      
    <head>
        <title>Login</title>
        <meta charset="uft-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/utils.js"></script> 
        <script type="text/javascript" src="js/login.js"></script>           
    </head>
    
    <body>
        
    <form>
        <h3>Login</h3>

        <label for="username">Usuário</label>
        <input type="text" placeholder="Usuário ou email" id="username" name="username">

        <label for="password">Senha</label>
        <input type="password" placeholder="Senha" id="password" name="password">

        <input id="buttonLogin" class="button" type="submit" value="Entrar">

        <div class="registrar">Não possui conta?<br>
        <a href="register.php">Clique aqui para se registrar</a></div>
    </body>
</html>