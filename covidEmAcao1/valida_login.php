<?php
session_start();
include_once("conexao.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin) {
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

    // echo "$usuario - $senha";

    if((!empty($usuario)) AND (!empty($senha))) {
        //echo password_hash($senha, PASSWORD_DEFAULT);

        //pesquisa no banco de dados
        $result_usuario = "SELECT id, usuario, senha FROM login WHERE usuario = '$usuario' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        if($resultado_usuario) {
            $row_usuario = mysqli_fetch_assoc($resultado_usuario);
            if(password_verify($senha, $row_usuario['senha'])) {
                $_SESSION['id'] = $row_usuario['id'];
                $_SESSION['usuario'] = $row_usuario['usuario'];
                $_SESSION['senha'] = $row_usuario['senha'];

                header("Location: menu.php");
            } else {
                $_SESSION['msg'] = "Login e senha incorretos";
                header("Location: login.php");
            }
        }
    } else {
        $_SESSION['msg'] = "Login e senha incorretos";
        header("Location: login.php");
    }
    
}else {
    $_SESSION['msg'] = "Página não encontrada";
    header("Location: login.php");
}