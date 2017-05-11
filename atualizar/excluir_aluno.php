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


            $sql_del = "DELETE FROM Jogador WHERE Email ='$emailLogado'";

            if(mysqli_query($con,$sql_del)){

                echo "Excluido";

            }else{

                echo "erro ao excluir";
            }
