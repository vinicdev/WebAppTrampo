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
        <link rel="stylesheet" href="assets/styles/cadastro_adm.css">
        <title>Cadastro Dados Vacinação</title>
    </head>
    <body>
        <div class="top">
            <a href="adm_listarVacinacao.php">Listar</a><br>
            <a href="menu.php">Menu</a><br>
        </div>
        <div class="fundo">
            <h1>Cadastro Dados Vacinação</h1>
            <form method="POST" action="proc_cad_vacinacao.php">
                <div class="formulario">
                    <label>Doses Aplicadas: </label>
                    <input type="number" name="doseAplicada" placeholder="Indique a quantidade" id="campo">
                </div>
                
                <div class="formulario">
                    <label>Doses Distribuidas: </label>
                    <input type="number" name="doseDistribuidas" placeholder="Indique a quantidade" id="campo">
                </div>
                
                <div class="formulario">
                    <label>Primeira Dose: </label>
                    <input type="number" name="primeiraDose" placeholder="Indique a quantidade" id="campo">
                </div>
    
                <div class="formulario">
                    <label>Segunda Dose: </label>
                    <input type="number" name="segundaDose" placeholder="Indique a quantidade" id="campo">
                </div>
    
                <div class="formulario">
                    <label>Recursos: </label>
                    <input type="number" name="recursos" placeholder="Indique a quantidade" id="campo">
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