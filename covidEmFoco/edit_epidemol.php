<?php
session_start();
include_once("conexao.php");

if(!empty($_SESSION['id'])) {

} else {
    $_SESSION['msg'] = "Faça o login para acessar essa página";
    header("Location: login.php");
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_dados = "SELECT * FROM dadosepidemiologicos WHERE id = '$id'";
$resultado_dados = mysqli_query($conn, $result_dados);
$row_dados = mysqli_fetch_assoc($resultado_dados);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/styles/edit_cad.css">
        <title>Altera Dados Epidemiologicos</title>
    </head>
    <body>
        <div class="top">
            <a href="adm_listarEpidemol.php">Listar</a><br>
            <a href="menu.php">Menu</a><br>
        </div>
        <div class="fundo">
            <h1>Altera Dados Epidemiologicos </h1>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                }
            ?>
            <form method="POST" action="proc_edit_epidemol.php">
                <input type="hidden" name="id" value="<?php echo $row_dados ['id']; ?>" id="campo"><br><br>
    
                <label>Casos: </label>
                <input type="number" name="casos" value="<?php echo $row_dados ['dadosCasos']; ?>" id="campo"><br><br>
                
                <label>Óbitos: </label>
                <input type="number" name="obitos" value="<?php echo $row_dados ['dadosObitos']; ?>" id="campo"><br><br>
    
                <input type="submit" value="Editar" id="button">
            </form>
        </div>
    </body>
</html>