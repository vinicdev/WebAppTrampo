<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listar Dados Vacinação</title>
    </head>
    <body>
        <a href="cad_vacinacao.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Dados Vacinação</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }

            //Lista os dados do BDD
            $result_vacinas = "SELECT * FROM dadosvacinacao";
            $resultado_vacina = mysqli_query($conn, $result_vacinas);
            while($row_vacina = mysqli_fetch_assoc($resultado_vacina)){
                echo "ID: ". $row_vacina['idCovid'] . "<br>";
                echo "Doses Aplicadas: ". $row_vacina['dosesAplicadas'] . "<br>";
                echo "Doses Distribuidas: ". $row_vacina['dosesDistribuidas'] . "<br>";
                echo "Primeira Dose: ". $row_vacina['primeiraDose'] . "<br>";
                echo "Segunda Dose: ". $row_vacina['segundaDose'] . "<br>";
                echo "Recursos: ". $row_vacina['recursos'] . "<br>";
                echo "Atualizado: ". $row_vacina['created'] . "<br>";
                echo "<a href='edit_vacinacao.php?id=". $row_vacina['idCovid'] . "'>Editar</a><br>";
                echo "<a href='proc_apagar_vacinacao.php?id=". $row_vacina['idCovid'] . "'>Apagar</a><br><hr>";
            }
        ?>
        
    </body>
</html>