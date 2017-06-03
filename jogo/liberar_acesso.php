<?php

require "../conecta.php";

$email_jogador  = $_POST['email_jogador'];
$sql_jogador        = "select idJogador from Jogador where Email='$email_jogador'";
$resultado    = mysqli_query($con, $sql_jogador);
$res          = mysqli_fetch_array($resultado);
$idJogador    = $res['idJogador'];
$idJogo         = $_POST['idJogo'];
$nome_jogo      = $_POST['nome_jogo'];
$idCurso        = $_POST['idCurso'];
$idProfessor    = $_POST['idProfessor'];

$sql       = "INSERT INTO Acesso(Status_Acesso,
                                 Jogador_idJogador,
                                 Jogador_Email,
                                 Jogo_idJogo,
                                 Jogo_Curso_idCurso,
                                 Jogo_Professor_idProfessor,
                                 Jogo_Descricao_Jogo) VALUE
                                        ('Solicitado',
                                        '$idJogador',
                                        '$email_jogador',
                                        '$idJogo',
                                        '$idCurso',
                                        '$idProfessor',
                                        '$nome_jogo')";
$resultado    = mysqli_query($con, $sql);
if ($resultado) {
    echo "inseriu";
} else {
    echo "nao_inseriu";

}



?>