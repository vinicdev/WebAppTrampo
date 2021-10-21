<?php
 session_start();

//inclução do documento de inclução
 include_once("conexao.php");


//Recebe os dados do formulário
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$casos = filter_input(INPUT_POST, 'casos', FILTER_SANITIZE_NUMBER_INT);
$obitos = filter_input(INPUT_POST, 'obitos', FILTER_SANITIZE_NUMBER_INT);



// echo "casos: $casos <br>";
// echo "obitos: $obitos <br>";
// die();


//Inserindo formato
$result_dados = "UPDATE dadosepidemiologicos SET dadosCasos='$casos', dadosObitos='$obitos', modified=NOW() WHERE id ='$id'";

// echo "$result_dados <br>";
// die();

//Fazendo conexão e inserindo os dados
$resultado_dados = mysqli_query($conn, $result_dados);

//Verifica se foi feito o cadastro e retorna uma mensagem
if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style = 'color:green;'>Dados Epidemiológicos Editado com sucesso</p>";
    header("Location: adm_listarEpidemol.php");
}else {
    $_SESSION['msg'] = "<p style = 'color:red;'>Dados Epidemiológicos não foi Editado com sucesso</p>";
    header("Location: edit_epidemol.php?id=$id");
}