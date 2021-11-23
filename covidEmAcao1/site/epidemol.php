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
            margin: 90px 0 70px 20px;
        }

        #box{
            margin-left: 240px;
            width: 300px;
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
                <li><a href="meiosDePreven.php" id="menua">Prevenções</a></li>
                <li><a href="../login.php" id="menuaLogin">Login</a></li>
            </ul>
        </nav>
    </header>
    <h1>Dados Epidemiologicos</h1>
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
        $atualizado = $row_dado['created'];

        ?>

    <div id="box">
        <h2>Casos</h2>
        <p><?php echo $casos; ?></p>    
    </div>
    <div id="box">
        <h2>Óbitos</h2>
        <p><?php echo $obitos; ?></p>
    </div>
    <div id="box">
        <h2>Atualizado</h2>
        <p><?php echo $atualizado; ?></p>  
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
            $result_dados = "SELECT * FROM dadosepidemiologicos";
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