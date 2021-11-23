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
        <title>Listar Dados Epidemiologicos</title>
        <link rel="stylesheet" href="assets/styles/listar.css">
    </head>
    <body>
        <div class="top">
            <a href="cad_epidemol.php">Cadastrar</a><br>
            <a href="menu.php">Menu</a><br>
        </div>
        <h1>Listar Dados Epidemiologicos</h1>
        <div id="bloco">
            <div id="info">
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                }

                //Lista os dados do BDD
                $result_dados = "SELECT * FROM dadosepidemiologicos";
                $resultado_dados = mysqli_query($conn, $result_dados);
                while($row_dados = mysqli_fetch_assoc($resultado_dados)){
                    echo "ID: " . $row_dados['id'] . "<br>";
                    echo "Casos: ". $row_dados['dadosCasos'] . "<br>";
                    echo "Obitos: ". $row_dados['dadosObitos'] . "<br>";
                    echo "Atualizado: ". $row_dados['created'] . "<br><br>";
                    echo "<a href='edit_epidemol.php?id=". $row_dados['id'] . "' id='button-block'>Editar</a><br>";
                    echo "<a href='proc_apagar_epidemol.php?id=". $row_dados['id'] . "' id='button-block'>Apagar</a><br><br><hr>";
                    
                }
            ?>
            </div>
        </div>
    </body>
</html>