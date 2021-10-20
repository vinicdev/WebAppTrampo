<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listar Dados Epidemiologicos</title>
    </head>
    <body>
        <a href="cadastroEpidemol.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Dados Epidemiologicos</h1>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset ($_SESSION['msg']);
            }

            //Receber o numero da página
            $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //Setar a quantidade de itens por página
            $qnt_result_pg = 3;

            //calcular o inicio visualização
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            //Lista os dados do BDD
            $result_dados = "SELECT * FROM dadosepidemiologicos LIMIT $inicio, $qnt_result_pg ";
            $resultado_dado = mysqli_query($conn, $result_dados);
            while($row_dado = mysqli_fetch_assoc($resultado_dado)){
                echo "ID: ". $row_dado['idDadosEpidemiologicos'] . "<br>";
                echo "Casos: ". $row_dado['dadosCasos'] . "<br>";
                echo "Obitos: ". $row_dado['dadosObitos'] . "<br>";
                echo "Atualizado: ". $row_dado['created'] . "<br><hr>";
            }

            //paginação
            $result_pg = "SELECT COUNT(idDadosEpidemiologicos) AS num_result FROM dadosepidemiologicos";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo $row_pg['num_result'];

            //Quantidade de páginas
            $quantidade_pg = ceil($row_pg ['num_result'] / $qnt_result_pg );

            //limitar os links
            $max_links = 2;
            echo "<a href = 'listarEpidemol.php?pagina=1'>Primeira</a>";

            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1) {
                    echo "<a href = 'listarEpidemol.php?pagina=$pag_ant'>$pag_ant</a>";
                }
            } 
            echo "$pagina";

            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                if($pag_dep <= $quantidade_pg){
                    echo "<a href = 'listarEpidemol.php?pagina=$pag_dep'>$pag_dep</a>";
                }
            }

            echo "<a href = 'listarEpidemol.php?pagina=$quantidade_pg'>Última</a>";

        ?>
        
    </body>
</html>