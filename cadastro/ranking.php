<?php
require_once "conecta.php";

$jogador = $_POST['cadastro_input_nome'];
$curso = $_POST['nome_do_curso'];
$disciplina = $_POST['nome_da_disciplina'];
$instituicao = $_POST['cadastro_input_instituicao'];
$premio = $_POST['input_login_senha'];


//$select = mysql_select_db("show_do_milhao") or die ("não acessou o db");

$result = mysqli_query( $con,"SELECT * FROM Professor WHERE email = '$login' AND  senha = '$senha'");
session_start();
if(mysqli_num_rows($result) > 0){
    $_SESSION['email'] = $login;
    $_SESSION['senha'] = $senha;
    $_SESSION['profissao'] = "professor";
    header("Location: dashboard.php");
}
else{
	$result = mysqli_query( $con,"SELECT * FROM Jogador WHERE email = '$login' AND  senha = '$senha'");

	if(mysqli_num_rows($result) > 0){
    $_SESSION['email'] = $login;
    $_SESSION['senha'] = $senha;
        $_SESSION['profissao'] = "aluno";
    header("Location: dashboard.php");
	
	}else{
    header("Location: login.html");
	}
}
?>