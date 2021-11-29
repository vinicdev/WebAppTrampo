<?php
session_start();
include_once("conexao.php");

if(!empty($_SESSION['id'])) {

} else {
    $_SESSION['msg'] = "Faça o login para acessar essa página";
    header("Location: login.php");
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM login WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/styles/edit_cad.css">
        <title>Editar Usuário</title>
    </head>
    <body>
        <div class="top">
            <a href="adm_listarUsuario.php">Listar</a><br>
            <a href="menu.php">Menu</a><br>
        </div>
        <div class="fundo">
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
                <input type="text" name="usuario" value="<?php echo $row_usuario ['usuario']; ?>" id="campo"><br><br>
    
                <input type="submit" value="Editar" id="button">
            </form>
        </div>
    </body>
</html>