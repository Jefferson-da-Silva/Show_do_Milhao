<?php

require_once "conecta.php";

$login = $_POST['input_login_email'];
$senha = $_POST['input_login_senha'];


//$select = mysql_select_db("show_do_milhao") or die ("não acessou o db");

$result = mysqli_query( $con,"SELECT * FROM Professor WHERE email = '$login' AND  senha = '$senha'");
session_start();
if(mysqli_num_rows($result) > 0){
    $_SESSION['email']=$login;
    $_SESSION['senha']=$senha;
    header("Location: dashboard.php");
}
else{
	$result = mysqli_query( $con,"SELECT * FROM Jogador WHERE email = '$login' AND  senha = '$senha'");

	if(mysqli_num_rows($result) > 0){
    $_SESSION['email']=$login;
    $_SESSION['senha']=$senha;
    header("Location: dashboard.php");
	
	}else{
    header("Location: login.html");
	}
}

?>
