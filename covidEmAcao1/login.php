<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="assets/style/login.css">
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Inter', sans-serif;
            }

            html {
                background-color: #242525;
                color: #fff;
                text-align: center;
            }
            
            .fundo {
                background: #6711d8;
                width: 400px;
                height: 370px;
                position: relative;
                left: 50%;
                transform: translate(-50%, 50%);

                border-radius: 7%;
            }

            h1 {
                padding-top: 30px;
                font-weight: 900;
            }

            form {
                margin-top: 75px;
                margin-bottom: 50px;
            }

            label {
                padding-right: 15px;
                font-size: 19px;
            }

            input {
                background-color: #d8d8d8;
                color: #000;
                border-radius: 10px;
            }
            
            #campo {
                width: 180px;
                height: 40px;
            }

            #button {
                width: 100px;
                height: 35px;
                background-color: #6711d8;
                color: #fff;
            }

            #button:hover {
                background-color: #390c74;
                color: rgb(255, 255, 255);
                cursor: pointer;
            }

        </style>
        <title>LOGIN</title>
    </head>
    <body>
        <div class="fundo">
        <h1>Login Administração</h1>
        <form method="POST" action="valida_login.php">
            <label>Usuário</label>
            <input type="text" name="usuario" placeholder="Digite o usuário" id="campo"><br><br>

            <label>Senha</label>
            <input type="password" name="senha" placeholder="Digite a senha" id="campo"><br><br>

            <input type="submit" name="btnLogin" value="Acessar" id="button"> 
        </form>
        <?php
            if(isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        </div>
    </body>
</html>