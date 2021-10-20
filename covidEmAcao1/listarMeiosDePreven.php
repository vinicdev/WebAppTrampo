<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listar Meios de Prevençã</title>
    </head>
    <body>
        <a href="cadastroMeiosDePreven.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Meios de Prevenção</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }

            //Receber o numero da página
            $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //Setar a quantidade de itens por página
            $qnt_result_pg = 5;

            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            //Lista os dados do BDD
            $result_meios = "SELECT * FROM meiosdeprevencao LIMIT $inicio, $qnt_result_pg ";
            $resultado_meios = mysqli_query($conn, $result_meios);
            while($row_meios = mysqli_fetch_assoc($resultado_meios)){
                echo "ID: ". $row_meios['idMeios'] . "<br>";
                echo "Doses Aplicadas: ". $row_meios['descricao'] . "<br>";
                echo "Atualizado: ". $row_meios['created'] . "<br><hr>";
            }

            //paginação
            $result_pg = "SELECT COUNT(idMeios) AS num_result FROM meiosdeprevencao";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo $row_pg['num_result'];

            //Quantidade de páginas
            $quantidade_pg = ceil($row_pg ['num_result'] / $qnt_result_pg );

            //limitar os links
            $max_links = 2;
            echo "<a href = 'listarVacinacao.php?pagina=1'>Primeira </a>";

            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1) {
                    echo "<a href = 'listarVacinacao.php?pagina=$pag_ant'> $pag_ant </a>";
                }
            } 
            echo "$pagina";

            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                if($pag_dep <= $quantidade_pg){
                    echo "<a href = 'listarVacinacao.php?pagina=$pag_dep'> $pag_dep </a>";
                }
            }

            echo "<a href = 'listarVacinacao.php?pagina=$quantidade_pg'> Última</a>";

        ?>
        
    </body>
</html>