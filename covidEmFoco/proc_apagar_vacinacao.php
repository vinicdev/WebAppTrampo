<?php
session_start();

//inclução do documento de conexao com BDD
include_once("conexao.php");


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)) {
    $result_meios = "DELETE FROM dadosvacinacao WHERE idcovid = '$id'";
    $resultado_meios = mysqli_query($conn, $result_meios);

    if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style = 'color:green;'>Dados da Vacinação Apagado com sucesso</p>";
    header("Location: adm_listarVacinacao.php");
    }else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Dados da Vacinação não foi Apagado com sucesso</p>";
    header("Location: adm_listarVacinacao.php?id=$id");
    }
}else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Necessário Selecionar um dos dados para excluir</p>";
    header("Location: adm_listarVacinacao.php?id=$id");
    }
