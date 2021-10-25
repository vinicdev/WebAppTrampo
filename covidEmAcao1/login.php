<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>LOGIN</title>
    </head>
    <body>
        <h2>Login Administração</h2>
        <?php
            if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="valida_login.php">
            <label>Usuário</label>
            <input type="text" name="usuario" placeholder="Digite o usuário"><br><br>

            <label>Senha </label>
            <input type="password" name="senha" placeholder="Digite a senha"><br><br>

            <input type="submit" name="btnLogin" value="Acessar">

        </form>
    </body>
</html>