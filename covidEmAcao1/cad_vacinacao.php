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
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: 'Inter', sans-serif;
            }

            html {
                background-color: #242525;
                color: #fff;
            }

            .fundo {
                background: #6711d8;
                width: 450px;
                height: 450px;
                position: relative;
                left: 50%;
                transform: translate(-50%, 50%);

                border-radius: 7%;
            }

            a {
                color: #fff;
                text-decoration: none;
            }
            
            a:hover {
                color: rgb(192, 163, 163);
            }

            h1 {
                text-align: center;
                padding-top: 70px;
                padding-bottom: 30px;
                color: #fff;
            }

            form {
                text-align: center;
            }

            input {
                background-color: #d8d8d8;
                color: #000;
                border-radius: 10px;
            }
            
            #campo {
                width: 180px;
                height: 30px;
            }

            #button {
                width: 100px;
                height: 25px;
                color: #000;
            }
            #button:hover {
                background: #ffffff85;
            }
        </style>
        <title>Cadastro Dados Vacinação</title>
    </head>
    <body>
        <a href="adm_listarVacinacao.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <div class="fundo">
            <h1>Cadastro Dados Vacinação</h1>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                }
            ?>
            <form method="POST" action="proc_cad_vacinacao.php">
                <label>Doses Aplicadas: </label>
                <input type="number" name="doseAplicada" placeholder="Indique a quantidade" id="campo"><br><br>
                
                <label>Doses Distribuidas: </label>
                <input type="number" name="doseDistribuidas" placeholder="Indique a quantidade" id="campo"><br><br>
                
                <label>Primeira Dose: </label>
                <input type="number" name="primeiraDose" placeholder="Indique a quantidade" id="campo"><br><br>
    
                <label>Segunda Dose: </label>
                <input type="number" name="segundaDose" placeholder="Indique a quantidade" id="campo"><br><br>
    
                <label>Recursos: </label>
                <input type="number" name="recursos" placeholder="Indique a quantidade" id="campo"><br><br>
    
                <input type="submit" value="cadastrar" id="button">
            </form>
        </div>
    </body>
</html>