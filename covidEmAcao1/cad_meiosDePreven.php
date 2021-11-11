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
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                }
            ?>
            <form method="POST" action="proc_cad_meiosDePreven.php">
                <div class="formulario">
                    <label>Meios de prevenção: </label>
                    <input type="text" name="meiosdepreven" placeholder="Digite meio de prevenção" id="campo">
                </div>
    
                <input type="submit" value="cadastrar" id="button">
            </form>
        </div>
    </body>
</html>