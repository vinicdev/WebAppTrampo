<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM login WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Editar Usuário</title>
    </head>
    <body>
        <a href="adm_listarUsuario.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Editar Usuário</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="proc_edit_usuario.php">
            <input type="hidden" name="id" value="<?php echo $row_usuario ['id']; ?>"><br><br>

            <label>Nome: </label>
            <input type="text" name="usuario" value="<?php echo $row_usuario ['usuario']; ?>"><br><br>

            <label>Senha: </label>
            <input type="text" name="senha" value="<?php echo $row_usuario ['senha']; ?>"><br><br>

            <input type="submit" value="Editar">
        </form>
    </body>
</html>