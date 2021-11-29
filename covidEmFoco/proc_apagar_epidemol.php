<?php
session_start();

//inclução do documento de conexao com BDD
include_once("conexao.php");


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)) {
    $result_epidemol = "DELETE FROM dadosepidemiologicos WHERE id = '$id'";
    $resultado_epidemol = mysqli_query($conn, $result_epidemol);

    if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style = 'color:green;'>Dados Epidemiologicos Apagado com sucesso</p>";
    header("Location: adm_listarEpidemol.php");
    }else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Dados Epidemiologicos não foi Apagado com sucesso</p>";
    header("Location: adm_listarEpidemol.php?id=$id");
    }
}else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Necessário Selecionar um dos dados para excluir</p>";
    header("Location: adm_listarEpidemol.php?id=$id");
    }
