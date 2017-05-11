<?php
require "../conecta.php";

        $nomeCurso = $_POST['nome_curso'];
        $nomeCurso = trim($nomeCurso);
        $idCurso;
        $value = "";


    $sql_curso = "SELECT idCurso FROM Curso WHERE Descricao_Curso = '$nomeCurso'";
    $resultado_curso = mysqli_query($con, $sql_curso);
    $existe_curso = mysqli_num_rows($resultado_curso);

    if ($existe_curso > 0) {
        while($res = mysqli_fetch_array($resultado_curso)) {
            $idCurso = $res['idCurso'];
        }
    }


    $sql_disciplina = "SELECT Descricao_Disciplina FROM Disciplina WHERE Curso_idCurso = '$idCurso'";
    $resultado_disciplina = mysqli_query($con, $sql_disciplina);
    $existe_disciplina = mysqli_num_rows($resultado_disciplina);



    if ($existe_disciplina > 0) {
        while($res = mysqli_fetch_array($resultado_disciplina)) {
            $value .= $res['Descricao_Disciplina'] . ", ";
        }
        echo $value;
    } else {
        echo "Nenhuma Disciplina Cadastrada";
    }


?>