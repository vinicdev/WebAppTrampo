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
    <title>VACINAÇÃO</title>
    <link rel="stylesheet" href="../assets/styles/index.css">
    <link rel="stylesheet" href="../assets/styles/consulta_site.css">
    <style>
        .resultado{
            margin: 90px 0 70px 120px;
        }
    </style>

</head>
<body>
    <header id="header">
        <a id="logo" href="#"><img src="../assets/image/logoifpr.png" id="imgLogo"></a>
        <nav id="nav">
            <ul id="menu" role="menu">
                <li><a href="index.html" id="menua">Inicio</a></li>
                <li><a href="sobre.html" id="menua">O que é</a></li>
                <li><a href="vacinacao.php" id="menua">Vacinas</a></li>
                <li><a href="epidemol.php" id="menua">Dados Epidemiologicos</a></li>
                <li><a href="meiosDePreven.php" id="menua">Prevenções</a></li>
                <li><a href="../login.php" id="menuaLogin">Login</a></li>
            </ul>
        </nav>
    </header>
    <h1>Dados Sobre Vacinação</h1>
    <div id="text">
        <p>
        O brasil conta com quatro Vacinas diferentes contra a covid-19 no momento. Os laboratórios responsáveis pela produção da CoronaVac, Oxford/Astrazeneca e Phizer/BioNTech recomendam a aplicação de duas doses de seus imunizantes. A fabricante da Janssen indica a
        necessidade de apenas uma dose. Hoje, o estado de São Paulo se tornou o primeiro a ter mais de 50% da população vacinada com a primeira
        dose. No total, ate as 17h25, 50,674 dos habitantes paulistas a receberam a dose inicial, o que deixa o estado na liderança nacional. Em
        termos percentuais Mato Grosso do sul continua à frente entre os estados com a maior parcela de sua população com vacinação completa.
        </p>
    </div>

    <div class="resultado">
    <?php 
        $result_id = "SELECT MAX(idCovid) as idCovid FROM dadosvacinacao";
        $resultado_id = mysqli_query($conn, $result_id);
        $row_id = mysqli_fetch_assoc($resultado_id);

        $ultimo_id = $row_id['idCovid'];

        $result_dados = "SELECT * FROM dadosvacinacao WHERE idCovid='$ultimo_id'";
        $resultado_dados = mysqli_query($conn, $result_dados);
        $row_dados = mysqli_fetch_assoc($resultado_dados);

        $dosesAplicadas = $row_dados['dosesAplicadas'];
        $dosesDistribuidas = $row_dados['dosesDistribuidas'];
        $pDose = $row_dados['primeiraDose'];
        $sDose = $row_dados['segundaDose'];
        $recurso = $row_dados['recursos'];
        $atualizado = $row_dados['created'];

        ?>

        <div id="box">
            <h2>Doses Aplicadas</h2>
            <p><?php echo $dosesAplicadas; ?></p>    
        </div>

        <div id="box">
            <h2>Doses Distribuidas</h2>
            <p><?php echo $dosesDistribuidas; ?></p>
        </div>

        <div id="box">
            <h2>Primeira Doses</h2>
            <p><?php echo $pDose; ?></p>  
        </div>

        <div id="box">
            <h2>Segunda Dose</h2>
            <p><?php echo $sDose; ?></p>  
        </div>

        <div id="box">
            <h2>Recursos Oferecidos</h2>
            <p><?php echo $recurso; ?></p>  
        </div>

    </div>

    <table>
        <h1>Histórico de dados</h1>
        <thead>
            <tr>
                <th>Dose Aplicadas</th>
                <th>Doses Distribuidas</th>
                <th>Primeira Dose</th>
                <th>Segunda Dose</th>
                <th>Recursos</th>
                <th>Data</th>
            </tr>
        </thead>
        <?php
            $result_dados = "SELECT * FROM dadosvacinacao";
            $resultado_dados = mysqli_query($conn, $result_dados);

            while($row_dados = mysqli_fetch_assoc($resultado_dados)){
                $dosesAplicadas = $row_dados['dosesAplicadas'];
                $dosesDistribuidas = $row_dados['dosesDistribuidas'];
                $pDose = $row_dados['primeiraDose'];
                $sDose = $row_dados['segundaDose'];
                $recurso = $row_dados['recursos'];
                $atualizado = $row_dados['created'];
        ?>
        <tr>
            <td><?php echo $dosesAplicadas; ?></td>
            <td><?php echo $dosesDistribuidas; ?></td>
            <td><?php echo $pDose ; ?></td>
            <td><?php echo $sDose ; ?></td>
            <td><?php echo $recurso ; ?></td>
            <td id="ultimo"><?php echo $atualizado; ?></td>
        </tr>
        <?php
            }
        ?>

</body>
</html>