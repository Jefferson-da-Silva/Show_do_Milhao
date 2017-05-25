<html>
<?php


?>
<head> </head>
<body>


<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center text-danger">Jogos</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Jogo</th>
                        <th>Curso</th>
                        <th>Instituição</th>
                        <th>Professor</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once "../conecta.php" ;


                    session_start();
                    $emailLogado = $_SESSION['email'];

                    $sql_prof = "SELECT * FROM Professor WHERE Email = '$emailLogado'";
                    $res_prof  =  mysqli_query($con, $sql_prof);
                    $res = mysqli_fetch_array($res_prof);
                    $id_prof = $res['idProfessor'];

                    $sql_jogo = "SELECT * FROM Jogo WHERE Professor_idProfessor = '$id_prof'";
                    $res_jogo = mysqli_query($con, $sql_jogo);


                    //$sql_partida = "select * from Jogo";
                    //$resultado_partida = mysqli_query($con, $sql_partida);
                    $index = 1;
                    while ($res = mysqli_fetch_array($res_jogo)) {
                        $nome = $res['Descricao_Jogo'];
                        $id_Jogo= $res['Curso_idCurso'];
                        $idProfessor= $res['Professor_idProfessor'];
                        $sql_curso = "select * from Curso where idCurso='$id_Jogo'";
                        $resultado_curso = mysqli_query($con, $sql_curso);
                        $res_curso= mysqli_fetch_array($resultado_curso);
                        $Descricao_Curso = $res_curso['Descricao_Curso'];

                        $sql_instituicao = "select * from Professor where idProfessor='$idProfessor'";
                        $resultado_professor = mysqli_query($con, $sql_instituicao);
                        $res_instituicao= mysqli_fetch_array($resultado_professor);
                        $Instituicao = $res_instituicao['Instituicao'];
                        $nome_Professor= $res_instituicao['Nome'];
                        echo "
                    <tr>
                      <td>$index</td>
                      <td>$nome</td>
                      <td>$Descricao_Curso</td>
                      <td>$Instituicao</td>
                      <td>$nome_Professor</td>
                      <td><a href='atualizar/editar_perguntas.php?nome=$nome' class='btn btn-danger btn-xs'>Editar</a></td>
                      <td><a href='atualizar/excluirJogo.php?nome=$nome' class='btn btn-danger btn-xs'>Excluir</a></td>


                    </tr>";
                        $index++;
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


</body>

</html>
