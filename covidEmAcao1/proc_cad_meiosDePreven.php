<?php
 session_start();

//inclução do documento de inclução
 include_once("conexao.php");


//Recebe os dados do formulário
$meiosdescricao = filter_input(INPUT_POST, 'meiosdepreven', FILTER_SANITIZE_STRING);
$sintomas = filter_input(INPUT_POST, 'sintomas', FILTER_SANITIZE_STRING);

// echo 'Sintomas: ' . $sintomas . '<br>'; 
// die();

//Inserindo formato
$result_dados = "INSERT INTO  meiosdeprevencao (descricao, sintomas, created) VALUES ('$meiosdescricao', '$sintomas', NOW())";

//Fazendo conexão e inserindo os dados
$resultado_dados = mysqli_query($conn, $result_dados);


//Verifica se foi feito o cadastro e retorna uma mensagem
if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style = 'color:#fff; text-align: center;'>Descrição Cadastrado com sucesso</p>";
    header("Location: cad_meiosDePreven.php");
}else {
    $_SESSION['msg'] = "<p style = 'color:#fff; text-align: center;'>Descrição não foi Cadastrado com sucesso</p>";
    header("Location: cad_meiosDePreven.php");
}