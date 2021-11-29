<?php
session_start();
include_once("conexao.php");

if(!empty($_SESSION['id'])) {

} else {
    $_SESSION['msg'] = "Faça o login para acessar essa página";
    header("Location: login.php");
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_dados = "SELECT * FROM dadosvacinacao WHERE idCovid = '$id'";
$resultado_dados = mysqli_query($conn, $result_dados);
$row_dados = mysqli_fetch_assoc($resultado_dados);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/styles/edit_cad.css">
        <title>Altera Dados Vacinação</title>
        <style>
            .fundo {
                height: 620px;
            }
        </style>
    </head>
    <body>
        <div class="top">
            <a href="adm_listarVacinacao.php">Listar</a><br>
            <a href="menu.php">Menu</a><br>
        </div>
        <div class="fundo">
            <h1>Altera Dados Vacinação</h1>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                }
            ?>
            <form method="POST" action="proc_edit_vacinacao.php">
                <input type="hidden" name="id" value="<?php echo $row_dados ['idCovid']; ?>"><br><br>
    
                <div class="formulario">
                    <label>Doses Aplicadas: </label>
                    <input type="number" name="dosesApli" value="<?php echo $row_dados ['dosesAplicadas']; ?>" id="campo"><br><br>
                </div>
                
                <div class="formulario">
                    <label>Doses Des.: </label>
                    <input type="number" name="dosesDistri" value="<?php echo $row_dados ['dosesDistribuidas']; ?>" id="campo"><br><br>
                </div>
                
                <div class="formulario">
                    <label>Primeira Dose: </label>
                    <input type="number" name="primeiraDos" value="<?php echo $row_dados ['primeiraDose']; ?>" id="campo"><br><br>
                </div>
                
                <div class="formulario">
                    <label>Segunda Dose: </label>
                    <input type="number" name="segundaDos" value="<?php echo $row_dados ['segundaDose']; ?>" id="campo"><br><br>
                </div>
                
                <div class="formulario">
                    <label>Recursos Dis.: </label>
                    <input type="number" name="recursosDistri" value="<?php echo $row_dados ['recursos']; ?>" id="campo"><br><br>
                </div>
                
                <input type="submit" value="Editar" id="button">
            </form>
        </div>
    </body>
    </html>