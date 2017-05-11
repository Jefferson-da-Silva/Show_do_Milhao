<?php
require "../conecta.php";

    $nomeCurso      = $_POST['nome_curso'];
    $nomeCurso      = trim($nomeCurso);
    $nomeDisciplina = $_POST['nome_disciplina'];
    $nomeDisciplina = trim($nomeDisciplina);
    $idCurso;
    $idDisciplina;
    $value = "";


    $sql_curso = "SELECT idCurso FROM Curso WHERE Descricao_Curso = '$nomeCurso'";
    $resultado_curso = mysqli_query($con, $sql_curso);
    $existe_curso = mysqli_num_rows($resultado_curso);

    if ($existe_curso > 0) {
        while($res = mysqli_fetch_array($resultado_curso)) {
            $idCurso = $res['idCurso'];
        }
    }

    $sql_disciplina = "SELECT idDisciplina FROM Disciplina WHERE Descricao_Disciplina = '$nomeDisciplina'";
    $resultado_disciplina = mysqli_query($con, $sql_disciplina);
    $existe_disicplina = mysqli_num_rows($resultado_disciplina);

    if ($existe_disicplina > 0) {
        while($res = mysqli_fetch_array($resultado_disciplina)) {
            $idDisciplina = $res['idDisciplina'];
        }
    }



    $sql_assunto = "SELECT Descricao_Assunto FROM Assunto WHERE Disciplina_Curso_idCurso = '$idCurso' AND Disciplina_idDisciplina = '$idDisciplina'";
    $resultado_assunto = mysqli_query($con, $sql_assunto);
    $existe_assunto = mysqli_num_rows($resultado_assunto);



    if ($existe_assunto > 0) {
        while($res = mysqli_fetch_array($resultado_assunto)) {
            $value .= $res['Descricao_Assunto'] . ", ";
        }
        echo $value;
    } else {
        echo "Nenhuma Assunto Cadastrado";
    }


?>