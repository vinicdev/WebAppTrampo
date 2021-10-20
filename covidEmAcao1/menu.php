<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="assets/styles/menu.css">
        <title>Menu - ADMINISTRAÇÃO</title>
    </head>
    <body>
        <h1>Menu de Administração</h1>
        <div class="opcoes">
            <h3>Login</h3>
            <div class="links">
                <a href="cadastroUsuario.php">Cadastrar</a><br>
                <a href="listarUsuario.php">Consultar</a>    
            </div>

            <h3>Dados Epidemiologicos</h3>
            <div class="links">
                <a href="cadastroEpidemol.php">Cadastrar</a><br>
                <a href="listarEpidemol.php">Consultar</a>
            </div>
            
            <h3>Dados Vacinação</h3>
            <div class="links">
                <a href="cadastroVacinacao.php">Cadastrar</a><br>
                <a href="listarVacinacao.php">Consultar</a>
            </div>
            
            <h3>Dados Meios de prevenção</h3>
            <div class="links">
                <a href="cadastroMeiosDePreven.php">Cadastrar</a><br>
                <a href="listarMeiosDePreven.php">Consultar</a>
            </div>
            
        </div>
        <div class="botoesFim">
            <a href="#">Sair</a><br>
            <a href="http://localhost/phpmyadmin/index.php" target="_blank">Banco</a><br>
        </div>

    </body>
</html>