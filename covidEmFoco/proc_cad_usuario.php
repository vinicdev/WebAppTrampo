<?php
session_start();

//inclução do documento de inclução
include_once("conexao.php");


//Recebe os dados do formulário
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$criptografa = password_hash($senha, PASSWORD_DEFAULT);

//Inserindo formato
$result_usuarios = "INSERT INTO login (usuario, senha, created) VALUES ('$usuario', '$criptografa', NOW())";

//Fazendo conexão e inserindo os dados
$resultado_usuario = mysqli_query($conn, $result_usuarios);

//Verifica se foi feito o cadastro e retorna uma mensagem
if(mysqli_insert_id($conn)){
    //verdadeiro
    $_SESSION['msg'] = "<p style = 'color:#fff; text-align: center;'>Usuário Cadastrado com sucesso</p>";
    header("Location: cad_usuario.php");
}else {
    //falso
    $_SESSION['msg'] = "<p style = 'color:#fff; text-align: center;'>Usuário não foi Cadastrado com sucesso</p>";
    header("Location: cad_usuario.php");
}
