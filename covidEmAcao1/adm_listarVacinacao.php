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
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: 'Inter', sans-serif;
            }

            html {
                background-color: #242525;
                color: #fff;
            }  

            h1 {
                text-align: center;
                padding: 100px 0 45px 0;
            }

            #bloco {
                font-size: 19px;
                width: 550px;
                height: auto;

                position: absolute;
                left: 35%;

                background-color: #6711D8;
                border-radius: 5px;
            }

            a {
                text-decoration: none;
                color: #7800FF;
            }
            
            a:hover {
                color: #a253fd;
            }

            #button-block {
                color: #000;
            }

            #button-block:hover {
                color: #c0c0c0;
            }
        </style>
        <title>Listar Dados Vacinação</title>
    </head>
    <body>
        <a href="cad_vacinacao.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Dados Vacinação</h1>
        <div id="bloco">
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
                echo "Atualizado: ". $row_vacina['created'] . "<br><br>";
                echo "<a href='edit_vacinacao.php?id=". $row_vacina['idCovid'] . "' id='button-block'>Editar</a><br>";
                echo "<a href='proc_apagar_vacinacao.php?id=". $row_vacina['idCovid'] . "' id='button-block'>Apagar</a><br><br><hr>";
            }
        ?>
        </div>
        
    </body>
</html>