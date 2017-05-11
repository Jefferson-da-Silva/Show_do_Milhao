<?php
	require_once "../conecta.php" ;
if(isset($_POST['botao_cadastrar_assunto'])) {
    $assunto        = $_POST['nome_do_assunto'];
    $assunto        = trim($assunto);
    $nomeCurso      = $_POST['nome_curso_assunto'];
    $nomeCurso      = trim($nomeCurso);
    $nomeDisciplina = $_POST['nome_disciplina_assunto'];
    $nomeDisciplina = trim($nomeDisciplina);

    $sql_curso = "SELECT idCurso FROM Curso WHERE Descricao_Curso = '$nomeCurso'";
    $resultado_curso = mysqli_query($con, $sql_curso);
    $existe_curso = mysqli_num_rows($resultado_curso);
    $idCurso;

    if ($existe_curso > 0) {
        while($res = mysqli_fetch_array($resultado_curso)) {
            $idCurso = $res['idCurso'];
        }
    }


    $sql_disciplina = "SELECT idDisciplina FROM Disciplina WHERE Descricao_Disciplina = '$nomeDisciplina'";
    $resultado_disciplina = mysqli_query($con, $sql_disciplina);
    $existe_disciplina = mysqli_num_rows($resultado_disciplina);
    $idDisciplina;

    if ($existe_disciplina > 0) {
        while($res = mysqli_fetch_array($resultado_disciplina)) {
            $idDisciplina = $res['idDisciplina'];
        }
    }



            $sql_assunto = "SELECT * FROM Assunto WHERE Descricao_Assunto = '$assunto'";
            $resultado_assunto = mysqli_query($con, $sql_assunto);
            $existe_assunto = mysqli_num_rows($resultado_assunto);
            if ($existe_assunto) {
                //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
            } else {
                $sql = "INSERT INTO Assunto (Descricao_Assunto, Disciplina_idDisciplina, Disciplina_Curso_idCurso) VALUE ('$assunto', '$idDisciplina', '$idCurso')";
                $insert = mysqli_query($con, $sql);
                if ($insert) {
                    header("Location: cadastro_jogo.php");
                } else {

                }
            }
        }
?>