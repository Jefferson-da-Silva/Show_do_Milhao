<?php
	require_once "../conecta.php" ;
    $assunto = $_POST['nome_do_assunto'];
    	if(isset($_POST['botao_cadastrar_assunto'])) {
            $sql_assunto = "select * from Assunto where Descricao_Assunto = '$assunto'";
            $resultado_assunto = mysqli_query($con, $sql_assunto);
            $existe_assunto = mysqli_num_rows($resultado_assunto);
            if ($existe_assunto) {
                //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
            } else {
                $sql = "insert into Assunto (Descricao_Assunto) value ('$assunto')";
                $insert = mysqli_query($con, $sql);
                if ($insert) {
                    header("Location: cadastro_jogo.html");
                } else {

                }
            }
        }
?>