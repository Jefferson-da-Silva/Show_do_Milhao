<?php

    require_once "../conecta.php" ;
    session_start();
    $emailLogado = $_SESSION['email'];

    $sql_prof = "SELECT * FROM Professor WHERE Email = '$emailLogado'";
    $res_prof  =  mysqli_query($con, $sql_prof);
    $res = mysqli_fetch_array($res_prof);
    $id_prof = $res['idProfessor'];

    $sql_jogo = "SELECT * FROM Jogo WHERE Professor_idProfessor = '$id_prof'";



?>