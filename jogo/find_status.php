<?php
require_once "../conecta.php";

        $email_jogador = $_POST['emailLogado'];
        $idJogo = $_POST['idJogo'];
        $idCurso = $_POST['idCurso'];
        $idProfessor = $_POST['idProfessor'];
        $nomeJogo = $_POST['nome'];

 $sql_acesso = "SELECT * FROM Acesso WHERE Jogador_Email = '$email_jogador'
                                                        AND Jogo_Curso_idCurso = $idCurso
                                                        AND Jogo_idJogo = $idJogo
                                                        AND Jogo_Professor_idProfessor= $idProfessor
                                                        AND Jogo_Descricao_Jogo= '$nomeJogo'";
$resultado_acesso = mysqli_query($con, $sql_acesso);
if($resultado_acesso){
    $res_acesso = mysqli_fetch_array($resultado_acesso);
    $status_acesso = $res_acesso['Status_Acesso'];
    echo $status_acesso;
}
else{
    echo "";
}

?>