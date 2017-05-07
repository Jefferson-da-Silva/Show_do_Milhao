<?php
	require_once "../conecta.php" ;
    $disciplina = $_POST['nome_da_disciplina'];
    	if(isset($_POST['botao_cadastrar_disciplina'])) {
            $sql_disciplina = "select * from Disciplina where Descricao_Disciplina = '$disciplina'";
            $resultado_disciplina = mysqli_query($con, $sql_disciplina);
            $existe_disciplina = mysqli_num_rows($resultado_disciplina);
            if ($existe_disciplina) {
                //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
            } else {
                $sql = "insert into Disciplina (Descricao_Disciplina) value ('$disciplina')";
                $insert = mysqli_query($con, $sql);
                if ($insert) {
                    header("Location: cadastro_jogo.html");
                } else {

                }
            }
        }
?>