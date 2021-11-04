<?php
session_start();
include_once("conexao.php");
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
            
            h1 {
                text-align: center;
                padding: 100px 0 45px 0;
            }
            
            #bloco {
                font-size: 19px;
                width: 550px;
                height: auto;

                position: absolute;
                left: 35%;

                background-color: #6711D8;
                border-radius: 5px;
            }

            a {
                text-decoration: none;
                color: #7800FF;
            }
            
            a:hover {
                color: #a253fd;
            }

            #button-block {
                color: #000;
            }

            #button-block:hover {
                color: #c0c0c0;
            }
        </style>

        <title>Listar Meios de Prevenção</title>
    </head>
    <body>
        <a href="cad_meiosDePreven.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Meios de Prevenção</h1>
        <div id="bloco">
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }

            //Lista os dados do BDD
            $result_meios = "SELECT * FROM meiosdeprevencao";
            $resultado_meios = mysqli_query($conn, $result_meios);
            while($row_meios = mysqli_fetch_assoc($resultado_meios)){
                echo "ID: ". $row_meios['idMeios'] . "<br>";
                echo "Doses Aplicadas: ". $row_meios['descricao'] . "<br>";
                echo "Cadastrado: ". $row_meios['created'] . "<br>";
                echo "Modificado: ". $row_meios['modified'] . "<br><br>"; 
                echo "<a href='edit_meiosDePreven.php?id=". $row_meios['idMeios'] . "' id='button-block'>Editar</a><br>";
                echo "<a href='proc_apagar_meiosDePreven.php?id=". $row_meios['idMeios'] . "' id='button-block'>Apagar</a><br><br><hr>";
            }
        ?>
        </div>
        
    </body>
</html>