<?php
 session_start();

//inclução do documento de inclução
 include_once("conexao.php");


//Recebe os dados do formulário
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$dAplicada = filter_input(INPUT_POST, 'dosesApli', FILTER_SANITIZE_NUMBER_INT);
$dDistribuida = filter_input(INPUT_POST, 'dosesDistri', FILTER_SANITIZE_NUMBER_INT);
$pDose = filter_input(INPUT_POST, 'primeiraDos', FILTER_SANITIZE_NUMBER_INT);
$sDose = filter_input(INPUT_POST, 'segundaDos', FILTER_SANITIZE_NUMBER_INT);
$recursosDistri = filter_input(INPUT_POST, 'recursosDistri', FILTER_SANITIZE_NUMBER_INT);


//Inserindo formato
$result_dados = "UPDATE dadosvacinacao SET dosesAplicadas='$dAplicada', dosesDistribuidas='$dDistribuida', primeiraDose='$pDose', segundaDose='$sDose', recursos='$recursosDistri', modified=NOW() WHERE idCovid ='$id'";

// echo $result_dados;
// die();

//Fazendo conexão e inserindo os dados
$resultado_dados = mysqli_query($conn, $result_dados);

//Verifica se foi feito o cadastro e retorna uma mensagem
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style = 'color:green;'>Dados Epidemiológicos Editado com sucesso</p>";
    header("Location: adm_listarVacinacao.php");
}else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Dados Epidemiológicos não foi Editado com sucesso</p>";
    header("Location: edit_vacinacao.php?id=$id");
}