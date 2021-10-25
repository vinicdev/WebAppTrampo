<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listar Meios de Prevenção</title>
    </head>
    <body>
        <a href="cad_meiosDePreven.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Meios de Prevenção</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }

            //Lista os dados do BDD
            $result_meios = "SELECT * FROM meiosdeprevencao";
            $resultado_meios = mysqli_query($conn, $result_meios);
            while($row_meios = mysqli_fetch_assoc($resultado_meios)){
                echo "ID: ". $row_meios['idMeios'] . "<br>";
                echo "Doses Aplicadas: ". $row_meios['descricao'] . "<br>";
                echo "Cadastrado: ". $row_meios['created'] . "<br>";
                echo "Modificado: ". $row_meios['modified'] . "<br>"; 
                echo "<a href='edit_meiosDePreven.php?id=". $row_meios['idMeios'] . "'>Editar</a><br>";
                echo "<a href='proc_apagar_meiosDePreven.php?id=". $row_meios['idMeios'] . "'>Apagar</a><br><hr>";
            }
        ?>
        
    </body>
</html>