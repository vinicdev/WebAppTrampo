<?php
 session_start();

//inclução do documento de inclução
 include_once("conexao.php");


//Recebe os dados do formulário
$dAplicada = filter_input(INPUT_POST, 'doseAplicada', FILTER_SANITIZE_NUMBER_INT);
$dDistribuidas = filter_input(INPUT_POST, 'doseDistribuidas', FILTER_SANITIZE_NUMBER_INT);
$pDose = filter_input(INPUT_POST, 'primeiraDose', FILTER_SANITIZE_NUMBER_INT);
$sDose = filter_input(INPUT_POST, 'segundaDose', FILTER_SANITIZE_NUMBER_INT);
$recurso = filter_input(INPUT_POST, 'recursos', FILTER_SANITIZE_NUMBER_INT);

//Inserindo formato
$result_dados = "INSERT INTO dadosvacinacao (dosesAplicadas, dosesDistribuidas, primeiraDose, segundaDose, recursos, created) VALUES ('$dAplicada', '$dDistribuidas', '$pDose', '$sDose', '$recurso', NOW())";

//Fazendo conexão e inserindo os dados
$resultado_dados = mysqli_query($conn, $result_dados);


//Verifica se foi feito o cadastro e retorna uma mensagem
if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style = 'color:#fff; text-align: center;'>Dados da Vacinação Cadastrado com sucesso</p>";
    header("Location: cad_vacinacao.php");
}else {
    $_SESSION['msg'] = "<p style = 'color:#fff; text-align: center;'>Dados da Vacinação não foi Cadastrado com sucesso</p>";
    header("Location: cad_vacinacao.php");
}