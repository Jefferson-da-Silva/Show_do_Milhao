<?php


require "../conecta.php";

$nomeCurso          = $_POST['nomeCurso'];
$nomeJogo           = $_POST['nomeJogo'];
$emailProfessor     = $_POST['emailProfessor'];
$visibilidade       = $_POST['visibilidade'];
$corretas_array     = $_POST['corretas_array'];
$perguntas_array    = $_POST['perguntas_array'];
$alternativas1_array = $_POST['alternativas1_array'];
$alternativas2_array = $_POST['alternativas2_array'];
$alternativas3_array = $_POST['alternativas3_array'];
$alternativas4_array = $_POST['alternativas4_array'];
$alternativas5_array = $_POST['alternativas5_array'];
$saida = -1;
$erros = "";


$sql_nomeJogo = "SELECT * FROM Jogo WHERE Descricao_Jogo = '$nomeJogo'";
$resultado_jogo = mysqli_query($con, $sql_nomeJogo);
$existe_nomeJogo = mysqli_num_rows($resultado_jogo);
if ($existe_nomeJogo) {
    echo "nome existe";
}else{

    $sql_professor = "SELECT idProfessor FROM Professor WHERE Email = '$emailProfessor'";
    $resultado_professor = mysqli_query($con, $sql_professor);
    $resultado_professor = mysqli_fetch_array($resultado_professor);
    $idProfessor = $resultado_professor['idProfessor'];

    $sql_curso = "SELECT idCurso FROM Curso WHERE Descricao_Curso = '$nomeCurso'";
    $resultado_curso = mysqli_query($con, $sql_curso);
    $resultado_curso = mysqli_fetch_array($resultado_curso);
    $idCurso = $resultado_curso['idCurso'];

    $sql_insertJogo = "INSERT INTO Jogo (Descricao_Jogo, Visibilidade_Jogo, Curso_idCurso,Professor_idProfessor) VALUES
                ('$nomeJogo','$visibilidade','$idCurso','$idProfessor')";
    $insertJogo = mysqli_query($con, $sql_insertJogo);
    if ($insertJogo) {
        $saida = 0;
        $sql_selectJogo = "SELECT idJogo FROM Jogo WHERE Descricao_Jogo = '$nomeJogo'";
        $resultado_selectJogo = mysqli_query($con, $sql_selectJogo);
        $resultado_selectJogo = mysqli_fetch_array($resultado_selectJogo);
        $idJogo = $resultado_selectJogo['idJogo'];

        for($i = 0; $i < count($perguntas_array); $i++){
            $sql = "INSERT INTO Perguntas
                            (Enunciado,
                            RespostaCorreta,
                            Alternativa_1,
                            Alternativa_2,
                            Alternativa_3,
                            Alternativa_4,
                            Alternativa_5,
                            Jogo_idJogo) VALUES(
                            '$perguntas_array[$i]',
                            '$corretas_array[$i]',
                            '$alternativas1_array[$i]',
                            '$alternativas2_array[$i]',
                            '$alternativas3_array[$i]',
                            '$alternativas4_array[$i]',
                            '$alternativas5_array[$i]',
                            '$idJogo')";
            $insert = mysqli_query($con, $sql);
            if ($insert) {
                $saida = 0;
            } else {
                $saida = 2;
            }
        }

    } else {
        $saida = 1;
    }
}

if($saida == -1){
    echo "false";
}else if($saida == 0){
    echo "inseriu";
}else if($saida == 1){
    echo "erro inserir pergunta";
}else if($saida == 2){
    echo "erro inserir jogo";
}

?>