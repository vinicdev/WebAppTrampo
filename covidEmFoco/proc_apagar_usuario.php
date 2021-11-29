<?php
session_start();

//inclução do documento de conexao com BDD
include_once("conexao.php");


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)) {
    $result_usuario = "DELETE FROM login WHERE id = '$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style = 'color:green;'>Usuário Apagado com sucesso</p>";
    header("Location: adm_listarUsuario.php");
    }else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Usuário não foi Apagado com sucesso</p>";
    header("Location: adm_listarUsuario.php?id=$id");
    }
}else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Necessário Selecionar um usuário</p>";
    header("Location: adm_listarUsuario.php?id=$id");
    }
