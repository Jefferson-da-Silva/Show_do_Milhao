<?php

require_once "../conecta.php" ;

  if (isset($_POST['botao_cadastro'])) {
    $profissao = $_POST['optradio_cadastro_profissao'];
    $nome = $_POST['cadastro_input_nome'];
    $cpf = $_POST['cadastro_input_cpf'];

//    if(!validaCPF($cpf)){
//     header("Location: cadastro.php?validacao=cpf_false");
//   }else {
        $curriculo = $_POST['cadastro_input_curriculo'];
        $instituicao = $_POST['cadastro_input_instituicao'];
        $email = $_POST['cadastro_input_email'];
        $titulo = $_POST['cadastro_input_titulo'];
        $senha = $_POST['cadastro_input_senha'];
        $confirma_senha = $_POST['cadastro_input_confirma_senha'];
        $equipe = '';


        if ($profissao == "radio_professor") {
            $sql_cpf = "select * from Professor where cpf = '$cpf'";
            $resultado_cpf = mysqli_query($con, $sql_cpf);
            $existe_cpf = mysqli_num_rows($resultado_cpf);
            if ($existe_cpf) {

                //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
            } else {
                $sql = "insert into Professor (Nome, CPF, Email, Curriculo, Instituicao, Titulacao, Senha ) value
            ('$nome', '$cpf', '$email', '$curriculo', '$instituicao', '$titulo', '$senha' )";
                $insert = mysqli_query($con, $sql);
                if ($insert) {
                    header("Location: ../login.html");
                } else {

                }
            }
        } else if ($profissao == "radio_aluno") {

            $sql_cpf = "select * from Jogador where CPF = '$cpf'";
            $resultado_cpf = mysqli_query($con, $sql_cpf);
            $existe_cpf = mysqli_num_rows($resultado_cpf);
            $sql_email = "select * from Jogador where Email = '$email'";
            $resultado_email = mysqli_query($con, $sql_email);
            $existe_email = mysqli_num_rows($resultado_email);
            if ($existe_cpf) {
                //echo "<script language='javascript' type='text/javascript'>swal('Usuario ja existente', '', 'error');</script>";
            } else {



                  $sql = "insert into Jogador (Nome, Instituicao, Equipe, CPF, Email, Senha ) value
            ('$nome', '$instituicao', '$equipe', '$cpf', '$email', '$senha')";
                    $insert = mysqli_query($con, $sql);
                    if ($insert) {
                        header("Location: ../login.html");
                    } else {
                        echo "não";
                        echo mysqli_error($con);


                }
            }
        }
  //  }



}
function validaCPF($cpf) {
 
    // Verifica se um número foi informado
    if(empty($cpf)) {
        return false;
    }
 
    // Elimina possivel mascara
    $cpf = preg_replace('[^0-9]', '', $cpf);
    $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);
     
    // Verifica se o numero de digitos informados é igual a 11 
    if (strlen($cpf) != 11) {
        return false;
    }
    // Verifica se nenhuma das sequências invalidas abaixo 
    // foi digitada. Caso afirmativo, retorna falso
    else if ($cpf == '00000000000' || 
        $cpf == '11111111111' || 
        $cpf == '22222222222' || 
        $cpf == '33333333333' || 
        $cpf == '44444444444' || 
        $cpf == '55555555555' || 
        $cpf == '66666666666' || 
        $cpf == '77777777777' || 
        $cpf == '88888888888' || 
        $cpf == '99999999999') {
        return false;
     // Calcula os digitos verificadores para verificar se o
     // CPF é válido
     } else {   
         
        for ($t = 9; $t < 11; $t++) {
             
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf{$c} != $d) {
                return false;
            }
        }
 
        return true;
    }
}
?>
