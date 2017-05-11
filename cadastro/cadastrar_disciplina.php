<?php
	require_once "../conecta.php" ;
if(isset($_POST['botao_cadastrar_disciplina'])) {
    $disciplina = $_POST['nome_da_disciplina'];
    $disciplina = trim($disciplina);
    $nomeCurso = $_POST['nome_curso'];
    $nomeCurso = trim($nomeCurso);


    $sql_curso = "select idCurso from Curso where  Descricao_Curso = '$nomeCurso'";
    $resultado_curso = mysqli_query($con, $sql_curso);
    $existe_curso = mysqli_num_rows($resultado_curso);
    $idCurso;

    if ($existe_curso > 0) {
        while($res = mysqli_fetch_array($resultado_curso)) {
            $idCurso = $res['idCurso'];
        }
    }
            $sql_disciplina = "select * from Disciplina where Descricao_Disciplina = '$disciplina'";
            $resultado_disciplina = mysqli_query($con, $sql_disciplina);
            $existe_disciplina = mysqli_num_rows($resultado_disciplina);
            if ($existe_disciplina) {
                //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
            } else {
                $sql = "insert into Disciplina (Descricao_Disciplina, Curso_idCurso) value ('$disciplina','$idCurso')";
                $insert = mysqli_query($con, $sql);
                if ($insert) {
                    header("Location: cadastro_jogo.php");
                } else {

                }
            }
        }
?>