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


                        $sql_acesso = "DELETE FROM Acesso Where Jogador_Email ='$emailLogado'";
                        mysqli_query($con, $sql_acesso);

                        $sql_del = "DELETE FROM Jogador WHERE Email ='$emailLogado'";

                        if (mysqli_query($con, $sql_del)) {

                            header("Location: ../logout.php?");

                        } else {

                            header("Location: ../dashboard.php?resut=excluirErro");

                        }
                    }

                    if ($profissao == "professor") {

                        $sql_professor = "SELECT * FROM Professor WHERE Email ='$emailLogado'";
                        $resultado_professor = mysqli_query($con, $sql_professor);
                        $res_professor = mysqli_fetch_array($resultado_professor);
                        $id_Prof = $res_professor['idProfessor'];

                        $sql_acesso = "DELETE FROM Acesso Where Jogo_Professor_idProfessor ='$id_Prof'";
                        mysqli_query($con, $sql_acesso);

                        $sql_jogo= "SELECT * FROM Jogo WHERE Professor_idProfessor ='$id_Prof' ";
                        $res_jogo  =  mysqli_query($con, $sql_jogo);
                        $res = mysqli_fetch_array($res_jogo);
                        $idJogo = $res['idJogo'];

                        $sql_del_perguntas = "DELETE FROM Perguntas WHERE Jogo_idJogo = $idJogo ";
                        mysqli_query($con, $sql_del_perguntas);


                        $sql_del = "DELETE FROM Jogo WHERE Professor_idProfessor ='$id_Prof'";
                        mysqli_query($con, $sql_del);
                        header("Location: meus_jogos.php?");
                        echo mysqli_error($con);

                        $sql_del = "DELETE FROM Professor WHERE Email ='$emailLogado'";
                        if (mysqli_query($con, $sql_del)) {

                            header("Location: ../logout.php?");

                        } else {

                            header("Location: ../dashboard.php?resut=excluirErro");

                        }
                    }
        }

?>