<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listar Dados Epidemiologicos</title>
    </head>
    <body>
        <a href="cadastroEpidemol.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Dados Epidemiologicos</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }

            //Lista os dados do BDD
            $result_dados = "SELECT * FROM dadosepidemiologicos";
            $resultado_dado = mysqli_query($conn, $result_dados);
            while($row_dado = mysqli_fetch_assoc($resultado_dado)){
                echo "ID: ". $row_dado['idDadosEpidemiologicos'] . "<br>";
                echo "Casos: ". $row_dado['dadosCasos'] . "<br>";
                echo "Obitos: ". $row_dado['dadosObitos'] . "<br>";
                echo "Atualizado: ". $row_dado['created'] . "<br><hr>";
            }
        ?>
        
    </body>
</html>