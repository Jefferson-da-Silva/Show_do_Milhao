<?php

require_once "../conecta.php" ;

  if (isset($_POST['botao_cadastro'])) {
    $profissao = $_POST['optradio_cadastro_profissao'];
    $nome = $_POST['cadastro_input_nome'];
    $cpf = $_POST['cadastro_input_cpf'];
    $curriculo = $_POST['cadastro_input_curriculo'];
    $instituicao = $_POST['cadastro_input_instituicao'];
    $email = $_POST['cadastro_input_email'];
    $senha = $_POST['cadastro_input_senha'];
    $confirma_senha = $_POST['cadastro_input_confirma_senha'];

    if ($profissao == "radio_professor") {
      $instituicao = "é professor";
      $profissao = 0;
  }
    else if($profissao == "radio_aluno"){
      $curriculo = "é aluno";
      $profissao = 1;
  }
    $cpf = $_POST['cadastro_input_cpf'];
    $email = $_POST['cadastro_input_email'];
    $sql_cpf = "select * from usuario where cpf = '$cpf'";
    $resultado_cpf = mysqli_query($con, $sql_cpf);
    $existe_cpf = mysqli_num_rows($resultado_cpf);
        if ($existe_cpf) {
         //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
        }
        else {
          $sql = "insert into usuario (profissao, nome, instituicao, email, senha, cpf, curriculo_lattes ) value
          ('$profissao', '$nome','$instituicao','$email', '$senha', '$cpf', '$curriculo' )";
          $insert = mysqli_query($con ,$sql);
          if ($insert) {
            echo "inseriu";
        }else {
          echo "não";
          echo mysqli_error($con);
        }
      }
  }



?>
