<?php
	require_once "../conecta.php" ;
    $curso = $_POST['nome_do_curso'];
    	if(isset($_POST['botao_cadastrar_curso'])) {
            $sql_curso = "select * from Curso where Descricao_Curso = '$curso'";
            $resultado_curso = mysqli_query($con, $sql_curso);
            $existe_curso = mysqli_num_rows($resultado_curso);
            if ($existe_curso) {
                //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
            } else {
                $sql = "insert into Curso (Descricao_Curso) value ('$curso')";
                $insert = mysqli_query($con, $sql);
                if ($insert) {
                    header("Location: cadastro_jogo.html");
                } else {

                }
            }
        }
?>