<?php
session_start();
include_once("conexao.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Listar Usuário</title>
    </head>
    <body>
        <a href="cadastroUsuario.php">Cadastrar</a><br>
        <a href="menu.php">Menu</a><br>
        <h1>Listar Usuário</h1>
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

            //Lista os usuários do BDD
            $result_usuarios = "SELECT * FROM login LIMIT $inicio, $qnt_result_pg ";
            $resultado_usuarios = mysqli_query($conn, $result_usuarios);
            while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "ID:". $row_usuario['id'] . "<br>";
                echo "Usuário:". $row_usuario['usuario'] . "<br>";
                echo "Senha:". $row_usuario['senha'] . "<br><hr>";
            }

            //paginação
            $result_pg = "SELECT COUNT(id) AS num_result FROM login";
            $resultado_pg = mysqli_query($conn, $result_pg);
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo $row_pg['num_result'];

            //Quantidade de páginas
            $quantidade_pg = ceil($row_pg ['num_result'] / $qnt_result_pg );

            //limitar os links
            $max_links = 2;
            echo "<a href = 'listarUsuario.php?pagina=1'>Primeira</a>";

            for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >= 1) {
                    echo "<a href = 'listarUsuario.php?pagina=$pag_ant'>$pag_ant</a>";
                }
            } 
            echo "$pagina";

            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                if($pag_dep <= $quantidade_pg){
                    echo "<a href = 'listarUsuario.php?pagina=$pag_dep'>$pag_dep</a>";
                }
            }

            echo "<a href = 'listarUsuario.php?pagina=$quantidade_pg'>Última</a>";

        ?>
        
    </body>
</html>