<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles/index.css">
    <style>
        html {
            background-color: #808080;
        }
        .resultado {
            text-align:center;
            color: #3D3333;
            font-size: 19px;
        }

        .resultado h1 {
            text-align: left;
            padding-bottom: 25px;
            color: #fff;
        }
    </style>
    <title>PREVENÇÃO</title>
</head>
<body>
    <header id="header">
        <a id="logo" href="#"><img src="../assets/image/logoifpr.png" id="imgLogo"></a>
        <nav id="nav">
            <button aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu" aria-expanded="false">Menu
                <span id="hamburger"></span>
            </button>
            <ul id="menu" role="menu">
                <li><a href="index.html" id="menua">Inicio</a></li>
                <li><a href="#" id="menua">Sobre</a></li>
                <li><a href="vacinacao.php" id="menua">Vacinas</a></li>
                <li><a href="epidemol.php" id="menua">Dados Epidemiologicos</a></li>
                <li><a href="meiosDePreven.php" id="menua">Prevenções</a></li>
                <li><a href="#" id="menuaLogin">Login</a></li>
            </ul>
        </nav>
    </header>
    <div class="resultado">
    <h1>Meios de Prevenções</h1>
        <?php
            $result_meios = "SELECT * FROM meiosdeprevencao";
            $resultado_meios = mysqli_query($conn, $result_meios);
            while($row_meios = mysqli_fetch_assoc($resultado_meios)){
                // echo "ID: ". $row_meios['idMeios'] . "<br>";
                echo "Descrição: ". $row_meios['descricao'] . "<br>";
                echo "Atualizado: ". $row_meios['created'] . "<br><hr>";
            }
        ?>
    </div>


    <!-- script -->
    <script src="../assets/js/main.js"></script>
</body>
</html>