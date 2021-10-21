<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro Meios de Prevenção</title>
    </head>
    <body>
        <a href="adm_listarMeiosDePreven.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Cadastrar Meios de Prevenção</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }
        ?>
        <form method="POST" action="proc_cad_meiosDePreven.php">
            <label>Meios de prevenção: </label>
            <input type="text" name="meiosdepreven" placeholder="Digite meio de prevenção"><br><br>

            <input type="submit" value="cadastrar">
        </form>
    </body>
</html>