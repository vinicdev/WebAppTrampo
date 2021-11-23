<?php
session_start();
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
        <title>Cadastro Meios de Prevenção</title>
        <link rel="stylesheet" href="assets/styles/cadastro_adm.css">
        <style>
            h1 {
                margin-bottom: 50px;
            }

            #campo {
                width: 190px;
            }
        </style>
    </head>
    <body>
        <a href="adm_listarMeiosDePreven.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <div class="fundo">
            <h1>Cadastrar Meios de Prevenção</h1>
            <form method="POST" action="proc_cad_meiosDePreven.php">
                <div class="formulario">
                    <label>Meios de prevenção: </label>
                    <input type="text" name="meiosdepreven" placeholder="Digite meios de prevenção" id="campo">

                </div>
                <div class="formulario">
                    <label>Sintomas: </label>
                    <input type="text" name="sintomas" placeholder="Digite os sintomas" id="campo">
                </div>

                <input type="submit" value="cadastrar" id="button">
            </form>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                }
            ?>
        </div>
    </body>
</html>