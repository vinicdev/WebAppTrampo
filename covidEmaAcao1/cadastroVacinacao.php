<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro Dados Vacinação</title>
    </head>
    <body>
        <a href="listarVacinacao.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Cadastro Dados Vacinação</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="processaVacinacao.php">
            <label>Doses Aplicadas: </label>
            <input type="number" name="doseAplicada" placeholder="Indique a quantidade"><br><br><hr>
            
            <label>Doses Distribuidas: </label>
            <input type="number" name="doseDistribuidas" placeholder="Indique a quantidade"><br><br><hr>
            
            <label>Primeira Dose: </label>
            <input type="number" name="primeiraDose" placeholder="Indique a quantidade"><br><br><hr>

            <label>Segunda Dose: </label>
            <input type="number" name="segundaDose" placeholder="Indique a quantidade"><br><br><hr>

            <label>Recursos: </label>
            <input type="number" name="recursos" placeholder="Indique a quantidade"><br><br><hr>

            <input type="submit" value="cadastrar">
        </form>
    </body>
</html>