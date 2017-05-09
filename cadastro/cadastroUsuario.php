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
      $sql_cpf = "select * from Professor where cpf = '$cpf'";
      $resultado_cpf = mysqli_query($con, $sql_cpf);
      $existe_cpf = mysqli_num_rows($resultado_cpf);
         if ($existe_cpf) {

           //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
          }
          else {
            $sql = "insert into Professor (Nome, CPF, Email, Curriculo, Instituicao, Titulacao, Senha ) value
            ('$nome', '$cpf', '$email', '$curriculo', '$instituicao', '$titulo', '$senha' )";
            $insert = mysqli_query($con ,$sql);
            if ($insert) {
                header("Location: ../login.html");
          }else {

          }
        }
    }


    else if($profissao == "radio_aluno"){

      $sql_cpf = "select * from Jogador where CPF = '$cpf'";
      $resultado_cpf = mysqli_query($con, $sql_cpf);
      $existe_cpf = mysqli_num_rows($resultado_cpf);
      $sql_email = "select * from Jogador where Email = '$email'";
      $resultado_email = mysqli_query($con, $sql_email);
      $existe_email = mysqli_num_rows($resultado_email);
          if ($existe_cpf) {
           //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
          }
          else {

            if($existe_email){

            }else{

              $sql = "insert into Jogador (Nome, Instituicao, Equipe, CPF, Email, Senha ) value
            ('$nome', '$instituicao', '$equipe', '$cpf', '$email', '$senha')";
            $insert = mysqli_query($con ,$sql);
             if ($insert) {
              header("Location: ../login.html");
              }else {
              echo "não";
              echo mysqli_error($con);

          }
            }
        }
    }




}
?>
