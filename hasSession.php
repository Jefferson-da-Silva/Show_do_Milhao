<?php

session_start();
if((!isset ($_SESSION['email'])) and (!isset($_SESSION['senha']))){
unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['profissao']);
header("Location: ../login.html");
}else{
if(($_SESSION['profissao']  == "aluno")){
header("Location: ../dashboard.php");
}
}
$emailLogado = $_SESSION['email'];
$senhaLogado = $_SESSION['senha'];
$profissaoLogado = $_SESSION['profissao'];
?>