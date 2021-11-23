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
        <link rel="stylesheet" href="assets/styles/listar.css">


        <title>Listar Meios de Prevenção</title>
    </head>
    <body>
        <div class="top">
            <a href="cad_meiosDePreven.php">Cadastrar</a><br>
            <a href="menu.php">Menu</a><br>
        </div>
        <h1>Listar Meios de Prevenção</h1>
        <div id="bloco">
            <div id="info">
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
                    echo "Meios de prevenção: ". $row_meios['descricao'] . "<br>";
                    echo "Sintomas: ". $row_meios['sintomas'] . "<br>";
                    echo "Cadastrado: ". $row_meios['created'] . "<br>";
                    echo "Modificado: ". $row_meios['modified'] . "<br><br>"; 
                    echo "<a href='edit_meiosDePreven.php?id=". $row_meios['idMeios'] . "' id='button-block'>Editar</a><br>";
                    echo "<a href='proc_apagar_meiosDePreven.php?id=". $row_meios['idMeios'] . "' id='button-block'>Apagar</a><br><br><hr>";
                }
            ?>
            </div>
        </div>
    </body>
</html>