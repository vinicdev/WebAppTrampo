<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listar Usuário</title>
    </head>
    <body>
        <a href="cadastroUsuario.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Usuário</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }

            //Lista os usuários do BDD
            $result_usuarios = "SELECT * FROM login";
            $resultado_usuarios = mysqli_query($conn, $result_usuarios);
            while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "ID:". $row_usuario['id'] . "<br>";
                echo "Usuário:". $row_usuario['usuario'] . "<br>";
                echo "Senha:". $row_usuario['senha'] . "<br><hr>";
            }
        ?>
        
    </body>
</html>