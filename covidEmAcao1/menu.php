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
        <meta charset="utf-8">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;900&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="assets/styles/menu.css"> -->
        <style>
            * {

                margin: 0;
                padding: 0;
                box-sizing: border-box;
                background-color: #242525;
                font-family: 'Inter', sans-serif;
    
                text-decoration: none;
            }

            h1 {
                /* padding-top: 100px; */
                padding: 100px 0 45px 0;
                color: #fff;
                text-align: center;
                font-weight: 900;
            }

            .opcoes {
               text-align: center;
            }

            .opcoes h3 {
                padding: 40px 0 15px 0;
            
                color: #fff;
            }

            .links {
                display: flex;
                left: 50%;
                position: absolute;
                transform: translate(-50%, -25%);
            }

            .opcoes a {
                color: #000000;
                background-color: #6711d8;
            
                padding: 5px 8px 5px 8px;
                margin-right: 25px;
                
                font-size: 23px;
                font-weight: 300;
            }

            .opcoes a:hover {
                background-color: #6711d875;
                color: rgb(255, 255, 255);
            }

            .botoesTop a{
                color: #fff;
            
            }

            .botoesTop a:hover {
                color: rgb(192, 163, 163);

            }
        </style>
        <title>Menu - ADMINISTRAÇÃO</title>
    </head>
    <body>
        <div class="botoesTop">
            <a href="sair.php">Sair</a><br>
            <a href="http://localhost/phpmyadmin/db_structure.php?server=1&db=covidemacao1" target="_blank">Banco</a><br>
        </div>
        <h1>Menu de Administração</h1>
        <div class="opcoes">
            <h3>Login</h3>
            <div class="links">
                <a href="cad_usuario.php">Cadastrar</a><br>
                <a href="adm_listarUsuario.php">Consultar/Editar/Excluir</a>    
            </div>

            <h3>Dados Epidemiologicos</h3>
            <div class="links">
                <a href="cad_epidemol.php">Cadastrar</a><br>
                <a href="adm_listarEpidemol.php">Consultar/Editar/Excluir</a>
            </div>
            
            <h3>Dados Vacinação</h3>
            <div class="links">
                <a href="cad_vacinacao.php">Cadastrar</a><br>
                <a href="adm_listarVacinacao.php">Consultar/Editar/Excluir</a>
            </div>
            
            <h3>Dados Meios de prevenção</h3>
            <div class="links">
                <a href="cad_meiosDePreven.php">Cadastrar</a><br>
                <a href="adm_listarMeiosDePreven.php">Consultar/Editar/Excluir</a>
            </div>
            
        </div>

    </body>
</html>