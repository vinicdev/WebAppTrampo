<?php
session_start();
include_once("../conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>DADOS EPIDEMIOLOGICOS</title>
    <link rel="stylesheet" href="../assets/styles/index.css">
    <link rel="stylesheet" href="../assets/styles/consulta_site.css">
    <style>
        .resultado {
            margin: 90px auto 70px auto;
        }

        #box{
            width: 571px;
        }
    </style>
</head>
<body>
    <header id="header">
        <a id="logo" href="#"><img src="../assets/image/logoifpr.png" id="imgLogo"></a>
        <nav id="nav">
            <ul id="menu" role="menu">
                <li><a href="index.html" id="menua">Inicio</a></li>
                <li><a href="#" id="menua">O que é?</a></li>
                <li><a href="vacinacao.php" id="menua">Vacinas</a></li>
                <li><a href="epidemol.php" id="menua">Dados Epidemiologicos</a></li>
                <li><a href="meiosDePreven.html" id="menua">Prevenções</a></li>
                <li><a href="../login.php" id="menuaLogin">Login</a></li>
            </ul>
        </nav>
    </header>
    <h1>Dados Epidemiologicos</h1>

    <div id="text">
        <p>
            A SMS explicou que quando você inala uma gotícula que está contaminada com o 
            Coronavírus, esse vírus entra nas células do nariz e começa a se multiplicar, produzindo mais 
            vírus, que vão entrando em outras células, danificando as mesmas, e produzindo mais vírus 
            que danificam ainda mais células. A quantidade de vírus que entraram em seu corpo, as células 
            que eles infectaram, e a resposta do seu corpo a esses vírus, vão refletir nos sintomas de cada 
            um. No geral depois que você foi infectado, demora de 2 a 14 dias pra você começar a ter 
            sintomas, e até hoje a ciência não conseguiu dizer quem vai desenvolver antes dos outros.
        </p>
    </div>
    <div class="resultado">
    <?php 
        $result_id = "SELECT MAX(id) as id FROM dadosepidemiologicos";
        $resultado_id = mysqli_query($conn, $result_id);
        $row_id = mysqli_fetch_assoc($resultado_id);

        $ultimo_id = $row_id['id'];

        $result_dados = "SELECT * FROM dadosepidemiologicos WHERE id='$ultimo_id'";
        $resultado_dados = mysqli_query($conn, $result_dados);
        $row_dado = mysqli_fetch_assoc($resultado_dados);

        $obitos = $row_dado['dadosObitos'];
        $casos = $row_dado['dadosCasos'];
        ?>

    <div id="box">
        <h2>Casos</h2>
        <p><?php echo $casos; ?></p>    
    </div>
    <div id="box">
        <h2>Óbitos</h2>
        <p><?php echo $obitos; ?></p>
    </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Casos</th>
                <th>Obitos</th>
                <th>Data</th>
            </tr>
        </thead>
        <?php
            $result_dados = "SELECT *, DATE_FORMAT(created, '%d/%m/%Y') as created FROM dadosepidemiologicos";
            $resultado_dados = mysqli_query($conn, $result_dados);

            while($row_dado = mysqli_fetch_assoc($resultado_dados)){
                $casos = $row_dado['dadosCasos'];
                $obitos = $row_dado['dadosObitos'];
                $atualizado = $row_dado['created'];
            
        ?>
        <tr>
            <td><?php echo $casos; ?></td>
            <td><?php echo $obitos; ?></td>
            <td id="ultimo"><?php echo $atualizado; ?></td>
        </tr>
        <?php
            }
        ?>

</body>
</html>