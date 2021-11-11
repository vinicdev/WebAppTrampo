<?php
session_start();
include_once("conexao.php");

if(!empty($_SESSION['id'])) {

} else {
    $_SESSION['msg'] = "Faça o login para acessar essa página";
    header("Location: login.php");
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_dados = "SELECT * FROM meiosdeprevencao WHERE idMeios = '$id'";
$resultado_dados = mysqli_query($conn, $result_dados);
$row_dados = mysqli_fetch_assoc($resultado_dados);
?>

<!DOCTYPE html>
<html>
    <head>
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
                width: 400px;
                height: 370px;
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
                padding-top: 80px;
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
        <title>Altera Dados Meios de Prevenção</title>
    </head>
    <body>
        <a href="adm_listarMeiosDePreven.php">Listar</a><br>
        <a href="menu.php">Menu</a><br>
        <div class="fundo">
            <h1>Altera Dados Meios de Prevenção</h1>
            <?php
                if(isset($_SESSION['msg'])){
                    echo $_SESSION['msg'];
                    unset ($_SESSION['msg']);
                }
            ?>
            <form method="POST" action="proc_edit_meiosDePreven.php">
                <input type="hidden" name="id" value="<?php echo $row_dados ['idMeios']; ?>" id="campo"><br><br>
    
                <label>Descrição: </label>
                <input type="text" name="descri" value="<?php echo $row_dados ['descricao']; ?>" id="campo"><br><br>
                
                
    
                <input type="submit" value="Editar" id="button">
            </form>
        </div>
    </body>
</html>