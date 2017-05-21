<?php

        require_once "../conecta.php" ;
        session_start();
        $profissao = $_SESSION['profissao'];
        $emailLogado = $_SESSION['email'];


        if(isset($_POST['botao_alterar'])) {

            if ($profissao == "aluno") {

                $nome = $_POST['cadastro_input_nome'];
                $cpf = $_POST['cadastro_input_cpf'];
                $instituicao = $_POST['cadastro_input_instituicao'];
                $email = $_POST['cadastro_input_email'];
                $senha = $_POST['cadastro_input_senha'];
                $confirma_senha = $_POST['cadastro_input_confirma_senha'];
                $equipe = "";


                $sql = "update Jogador set
              nome = '$nome',
              instituicao = '$instituicao',
              equipe = '$equipe',
              cpf = '$cpf',
              email = '$email',
              senha = '$senha'
              WHERE email = '$emailLogado' ";
            }
            if ($profissao == "professor") {

                $nome = $_POST['cadastro_input_nome'];
                $cpf = $_POST['cadastro_input_cpf'];
                $curriculo = $_POST['cadastro_input_curriculo'];
                $titulo = $_POST['cadastro_input_titulo'];
                $instituicao = $_POST['cadastro_input_instituicao'];
                $email = $_POST['cadastro_input_email'];
                $senha = $_POST['cadastro_input_senha'];
                $confirma_senha = $_POST['cadastro_input_confirma_senha'];


                $sql = "update Professor set
              nome = '$nome',
              cpf = '$cpf',
              email= '$email',
              curriculo = '$curriculo',
              instituicao = '$instituicao',
              titulacao = '$titulo',
              senha= '$senha'
              WHERE email = '$emailLogado'";

            }
            if (mysqli_query($con, $sql)) {
                header("Location: ../dashboard.php?resut=atualizado");

            } else {

                header("Location: ../dashboard.php?resut=atualizadoErro");
            }

        }

                if(isset($_POST['botao_excluir'])){

                    if ($profissao == "aluno") {

                        $sql_del = "DELETE FROM Jogador WHERE Email ='$emailLogado'";

                        if (mysqli_query($con, $sql_del)) {

                            header("Location: ../logout.php?");

                        } else {

                            header("Location: ../dashboard.php?resut=excluirErro");

                        }
                    }

                    if ($profissao == "professor") {

                        $sql_del = "DELETE FROM Professor WHERE Email ='$emailLogado'";

                        if (mysqli_query($con, $sql_del)) {

                            header("Location: ../logout.php?");

                        } else {

                            header("Location: ../dashboard.php?resut=excluirErro");

                        }
                    }
        }

?>