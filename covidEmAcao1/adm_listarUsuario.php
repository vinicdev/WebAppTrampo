<?php
session_start();
include_once("conexao.php");
if(!empty($_SESSION['id'])) {

} else {
    $_SESSION['msg'] = "Faça o login para acessar essa página";
    header("Location: login.php");

}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;900&display=swap" rel="stylesheet">
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/styles/cadastro.css">
        <title>Listar Usuário</title>
    </head>
    <body>
        <a href="cad_usuario.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Usuário</h1>
        <div id="bloco">
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }

            $result_usuarios = "SELECT * FROM login ";
            $resultado_usuarios = mysqli_query($conn, $result_usuarios);
            while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "ID: " . $row_usuario['id'] . "<br>";
                echo "Usuário: ". $row_usuario['usuario'] . "<br><br>";
                echo "<a href='edit_usuario.php?id=". $row_usuario['id'] . "' id='button-block'>Editar</a><br>";
                echo "<a href='proc_apagar_usuario.php?id=". $row_usuario['id'] . "' id='button-block'>Apagar</a><br><br><hr>";
            }
        ?>
        </div>
        
    </body>
</html>