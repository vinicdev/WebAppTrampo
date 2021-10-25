<?php
session_start();

//inclução do documento de conexao com BDD
include_once("conexao.php");


//Recebe os dados do formulário
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);


//Inserindo formato
$result_usuarios = "UPDATE login SET usuario='$usuario', senha='$senha', modified=NOW() WHERE id='$id'";


//Fazendo conexão e inserindo os dados
$resultado_usuario = mysqli_query($conn, $result_usuarios);

//Verifica se foi feito o cadastro e retorna uma mensagem
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style = 'color:green;'>Usuário Editado com sucesso</p>";
    header("Location: adm_listarUsuario.php");
}else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Usuário não foi Editado com sucesso</p>";
    header("Location: edit_usuario.php?id=$id");
}