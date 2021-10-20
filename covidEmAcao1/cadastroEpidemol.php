<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro Dados Epidemiologicos</title>
    </head>
    <body>
        <a href="listarEpidemol.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Cadastro Dados Epidemiologicos </h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="processaEpidemol.php">
            <label>Casos: </label>
            <input type="number" name="casos" placeholder="Indique a quantidade"><br><br>
            
            <label>Óbitos: </label>
            <input type="number" name="obitos" placeholder="Indique a quantidade"><br><br>

            <input type="submit" value="cadastrar">
        </form>
    </body>
</html>