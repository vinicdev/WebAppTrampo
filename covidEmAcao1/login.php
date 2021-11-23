<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/styles/login.css">
        <title>LOGIN</title>
    </head>
    <body>
        <div class="fundo">
        <h1>Login Administração</h1>
        <form method="POST" action="valida_login.php">
            <label>Usuário</label>
            <input type="text" name="usuario" placeholder="Digite o usuário" id="campo"><br><br>

            <label>Senha</label>
            <input type="password" name="senha" placeholder="Digite a senha" id="campo"><br><br>

            <input type="submit" name="btnLogin" value="Acessar" id="button"> 
        </form>
        <?php
            if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        </div>
    </body>
</html>