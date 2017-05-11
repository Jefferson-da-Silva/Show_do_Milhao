<?php

        require_once "../conecta.php" ;
        session_start();
        if((!isset ($_SESSION['email'])==true) and(!isset($_SESSION['senha'])==true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header("Location: login.html");
        }
        $emailLogado = $_SESSION['email'];
        $senhaLogado = $_SESSION['senha'];
        $profissaoLogado = $_SESSION['profissao'];



        $nome = $_POST['cadastro_input_nome'];
        $cpf = $_POST['cadastro_input_cpf'];
        $instituicao = $_POST['cadastro_input_instituicao'];
        $email = $_POST['cadastro_input_email'];
        $senha = $_POST['cadastro_input_senha'];
        $confirma_senha = $_POST['cadastro_input_confirma_senha'];
        $equipe="";



            $sql = "update jogador set
              nome = '$nome',
              instituicao = '$instituicao',
              equipe = '$equipe',
              cpf = '$cpf',
              email = '$email',
              senha = '$senha'
              WHERE email = '$emailLogado' ";

        if(mysqli_query($con, $sql)){

            echo "Atualizado com sucesso";

        }else{

            echo "Erroa ao atualizar";

        }





?>