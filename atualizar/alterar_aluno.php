<?php

        require_once "../conecta.php" ;

        $email = $_GET['email'];
        echo $email;

        $sql_jogador = "Select * FROM jogador WHERE email = '$email'";




?>