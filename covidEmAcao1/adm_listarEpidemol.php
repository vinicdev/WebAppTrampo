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
        <meta charset="utf-8">
        <style>
            a {
                text-decoration: none;
                color: #7800FF;
            }
        </style>
        <title>Listar Dados Epidemiologicos</title>
    </head>
    <body>
        <a href="cad_epidemol.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Dados Epidemiologicos</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }

            //Lista os dados do BDD
            $result_dados = "SELECT * FROM dadosepidemiologicos";
            $resultado_dados = mysqli_query($conn, $result_dados);
            while($row_dados = mysqli_fetch_assoc($resultado_dados)){
                echo "ID: " . $row_dados['id'] . "<br>";
                echo "Casos: ". $row_dados['dadosCasos'] . "<br>";
                echo "Obitos: ". $row_dados['dadosObitos'] . "<br>";
                echo "Atualizado: ". $row_dados['created'] . "<br>";
                echo "<a href='edit_epidemol.php?id=". $row_dados['id'] . "'>Editar</a><br>";
                echo "<a href='proc_apagar_epidemol.php?id=". $row_dados['id'] . "'>Apagar</a><br><hr>";
                
            }
        ?>
        
    </body>
</html>