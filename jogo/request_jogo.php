<?php
require_once "../conecta.php";
session_start();

$emailLogado = $_SESSION['email'];
$nomeJogo = $_SESSION['Descricao_Jogo'];
$sql_jogo = "SELECT * FROM Jogo WHERE Descricao_Jogo ='$nomeJogo'";
$resultado_jogo    = mysqli_query($con, $sql_jogo);
$res_jogo          = mysqli_fetch_array($resultado_jogo);
$id_jogo = $res_jogo['idJogo'];

$sql_perguntas = "SELECT * FROM Perguntas WHERE Jogo_idJogo = '$id_jogo'";
$resultado_perguntas = mysqli_query($con, $sql_perguntas);

while ($res_perguntas = mysqli_fetch_array($resultado_perguntas)) {
    echo $enunciado_array[] = $res_perguntas['Enunciado'];
    $resposta_correta[] = $res_perguntas['RespostaCorreta'];
    $alternativa_1[] = $res_perguntas['Alternativa_1'];
    $alternativa_2[] = $res_perguntas['Alternativa_2'];
    $alternativa_3[] = $res_perguntas['Alternativa_3'];
    $alternativa_4[] = $res_perguntas['Alternativa_4'];
    $alternativa_5[] = $res_perguntas['Alternativa_5'];

}
?>