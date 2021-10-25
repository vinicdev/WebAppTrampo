<?php
 session_start();

//inclução do documento de inclução
 include_once("conexao.php");


//Recebe os dados do formulário
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$descricao = filter_input(INPUT_POST, 'descri', FILTER_SANITIZE_STRING);


//Inserindo formato
$result_dados = "UPDATE meiosdeprevencao SET descricao = '$descricao', modified=NOW() WHERE idMeios ='$id'";

// echo $result_dados;
// die();

//Fazendo conexão e inserindo os dados
$resultado_dados = mysqli_query($conn, $result_dados);

//Verifica se foi feito o cadastro e retorna uma mensagem
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style = 'color:green;'>Dados Epidemiológicos Editado com sucesso</p>";
    header("Location: adm_listarMeiosDePreven.php");
}else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Dados Epidemiológicos não foi Editado com sucesso</p>";
    header("Location: edit_meiosDePreven.php?id=$id");
}