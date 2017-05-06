<?php

require_once "../conecta.php" ;

  if (isset($_POST['botao_cadastro'])) {
    $profissao = $_POST['optradio_cadastro_profissao'];
    $nome = $_POST['cadastro_input_nome'];
    $cpf = $_POST['cadastro_input_cpf'];
    $curriculo = $_POST['cadastro_input_curriculo'];
    $instituicao = $_POST['cadastro_input_instituicao'];
    $email = $_POST['cadastro_input_email'];
    $titulo = $_POST['cadastro_input_titulo'];
    $senha = $_POST['cadastro_input_senha'];
    $confirma_senha = $_POST['cadastro_input_confirma_senha'];
    $equipe="";

    if ($profissao == "radio_professor") {
      $sql = "INSERT INTO professor (Nome, CPF, Email, Curriculo, Instituicao, Titulacao, Senha ) VALUE
      ('$nome', '$cpf', $email, '$curriculo', '$instituicao', '$titulo', '$senha' )";
      $insert = mysqli_query($con ,$sql);

      $cpf = $_POST['cadastro_input_cpf'];
      $email = $_POST['cadastro_input_email'];
      $sql_cpf = "select * from professor where cpf = '$cpf'";
      $resultado_cpf = mysqli_query($con, $sql_cpf);
      $existe_cpf = mysqli_num_rows($resultado_cpf);
         if ($existe_cpf) {
           //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
          }
          else {
          //  $sql = "insert into professor (Nome, CPF, Email, Curriculo, Instituicao, Titulacao, Senha ) value
          //  ('$nome', '$cpf', $email, '$curriculo', '$instituicao', '$titulo', '$senha' )";
          //  $insert = mysqli_query($con ,$sql);
            if ($insert) {
              echo "inseriu";
          }else {
            echo "não";
            echo mysqli_error($con);
          }
        }
    }


    else if($profissao == "radio_aluno"){
      $sql = "insert into jogador (Nome, Instituicao, Equipe, CPF, Email, Senha) value
      ('$nome', '$instituicao', '$equipe', '$cpf', '$email', $senha')";
      $insert = mysqli_query($con ,$sql);

      $cpf = $_POST['cadastro_input_cpf'];
      $email = $_POST['cadastro_input_email'];
      $sql_cpf = "select * from jogador where cpf = '$cpf'";
      $resultado_cpf = mysqli_query($con, $sql_cpf);
      $existe_cpf = mysqli_num_rows($resultado_cpf);
          if ($existe_cpf) {
           //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
          }
          else {
            $sql = "insert into jogador (Nome, Instituicao, Equipe, CPF, Email, Senha, ) value
            ('$nome', '$instituicao', '$equipe', '$cpf', '$email', $senha')";
            $insert = mysqli_query($con ,$sql);
            if ($insert) {
              echo "inseriu";
          }else {
            echo "não";
            echo mysqli_error($con);
          }
        }
    }




}
?>
