<!DOCTYPE html>
    <html>
        
    <head>
        <title>Registrar</title>
        <meta charset="uft-8">
        <meta name="viewport" content="width=devide-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/register.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript" src="js/utils.js"></script> 
        <script type="text/javascript" src="js/register.js"></script> 
    </head>
    
    <body>
        
    <form>
        <h3>Registrar Conta</h3>

        <label for="email">Email</label>
        <input type="email" placeholder="Email" id="email" name="email">

        <label for="username">Nome do usuário</label>
        <input type="text" placeholder="Nome do usuário" id="username" name="username">

        <label for="name">Nome completo</label>
        <input type="text" placeholder="Nome completo" id="name" name="name">

        <label for="password">Senha</label>
        <input type="password" placeholder="Senha" id="password" name="password">

        <label for="password-confirm">Confirmação da senha</label>
        <input type="password" placeholder="Confirmação da senha" id="password-confirm" name="password-confirm">

        <input class="button" id="buttonRegister" type="submit" value="Registrar">

        <div class="tela-login">Já possui conta?<br>
        <a href="login.php">Clique aqui para fazer login</a></div>
    </body>
</html>