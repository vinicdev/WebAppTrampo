<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro Usuário</title>
    </head>
    <body>
        <a href="listarUsuario.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Cadastrar Usuário</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="processaUsuario.php">
            <label>Nome: </label>
            <input type="text" name="usuario" placeholder="Digite um usuário"><br><br>

            <label>Senha: </label>
            <input type="text" name="senha" placeholder="Digite uma senha"><br><br>

            <input type="submit" value="cadastrar">
        </form>
    </body>
</html>