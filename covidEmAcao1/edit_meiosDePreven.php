<?php
session_start();
include_once("conexao.php");

if(!empty($_SESSION['id'])) {

} else {
    $_SESSION['msg'] = "Faça o login para acessar essa página";
    header("Location: login.php");
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_dados = "SELECT * FROM meiosdeprevencao WHERE idMeios = '$id'";
$resultado_dados = mysqli_query($conn, $result_dados);
$row_dados = mysqli_fetch_assoc($resultado_dados);

// echo "resultado: $result_dados  <br>";
// die();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Altera Dados Meios de Prevenção</title>
    </head>
    <body>
        <a href="adm_listarMeiosDePreven.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Altera Dados Meios de Prevenção</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="proc_edit_meiosDePreven.php">
            <input type="hidden" name="id" value="<?php echo $row_dados ['idMeios']; ?>"><br><br>

            <label>Descrição: </label>
            <input type="text" name="descri" value="<?php echo $row_dados ['descricao']; ?>"><br><br>
            
            

            <input type="submit" value="Editar">
        </form>
    </body>
</html>