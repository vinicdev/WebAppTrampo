<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_dados = "SELECT * FROM dadosvacinacao WHERE idCovid = '$id'";
$resultado_dados = mysqli_query($conn, $result_dados);
$row_dados = mysqli_fetch_assoc($resultado_dados);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Altera Dados Vacinação</title>
    </head>
    <body>
        <a href="adm_listarVacinacao.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Altera Dados Vacinação</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="proc_edit_vacinacao.php">
            <input type="hidden" name="id" value="<?php echo $row_dados ['idCovid']; ?>"><br><br>

            <label>Doses Aplicadas: </label>
            <input type="number" name="dosesApli" value="<?php echo $row_dados ['dosesAplicadas']; ?>"><br><br>
            
            <label>Doses Destribuídas: </label>
            <input type="number" name="dosesDistri" value="<?php echo $row_dados ['dosesDistribuidas']; ?>"><br><br>

            <label>Primeira Dose: </label>
            <input type="number" name="primeiraDos" value="<?php echo $row_dados ['primeiraDose']; ?>"><br><br>
            
            <label>Segunda Dose: </label>
            <input type="number" name="segundaDos" value="<?php echo $row_dados ['segundaDose']; ?>"><br><br>
            
            <label>Recursos Distribuídos: </label>
            <input type="number" name="recursosDistri" value="<?php echo $row_dados ['recursos']; ?>"><br><br>

            <input type="submit" value="Editar">
        </form>
    </body>
</html>