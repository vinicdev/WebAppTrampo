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
        <title>Cadastro Usuário</title>
        <link rel="stylesheet" href="assets/styles/cadastro_adm.css">
        <style>
            h1 {
                margin-bottom: 50px;
            }
        </style>

        
    </head>
    <body>
        <div class="top">
            <a href="adm_listarUsuario.php">Listar</a><br>
            <a href="menu.php">Menu</a>
        </div>
        <div class="fundo">
            <h1>Cadastrar Usuário</h1>
            <form method="POST" action="proc_cad_usuario.php">
                <label>Nome: </label>
                <input type="text" name="usuario" placeholder="Digite um usuário" id="campo"><br><br>
    
                <label>Senha: </label>
                <input type="password" name="senha" placeholder="Digite uma senha" id="campo"><br><br>
    
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

