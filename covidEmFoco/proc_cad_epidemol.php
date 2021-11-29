<?php
 session_start();

//inclução do documento de inclução
 include_once("conexao.php");


//Recebe os dados do formulário
$casos = filter_input(INPUT_POST, 'casos', FILTER_SANITIZE_NUMBER_INT);
$obitos = filter_input(INPUT_POST, 'obitos', FILTER_SANITIZE_NUMBER_INT);

//Inserindo formato
$result_dados = "INSERT INTO dadosepidemiologicos (dadosCasos, dadosObitos, created) VALUES ('$casos', '$obitos', NOW())";

//Fazendo conexão e inserindo os dados
$resultado_dados = mysqli_query($conn, $result_dados);

//Verifica se foi feito o cadastro e retorna uma mensagem
if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style = 'color:#fff; text-align: center;'>Dados Epidemiológicos Cadastrado com sucesso</p>";
    header("Location: cad_epidemol.php");
}else {
    $_SESSION['msg'] = "<p style = 'color:#fff; text-align: center;'>Dados Epidemiológicos não foi Cadastrado com sucesso</p>";
    header("Location: cad_epidemol.php");
}