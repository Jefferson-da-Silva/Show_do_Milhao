<html>
<?php

session_start();
if((!isset ($_SESSION['email'])) and (!isset($_SESSION['senha']))){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    unset($_SESSION['profissao']);
    header("Location: login.html");
}

$emailLogado = $_SESSION['email'];
$senhaLogado = $_SESSION['senha'];
$profissaoLogado = $_SESSION['profissao'];

?>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head><body>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span> Show do Milhão <img src="img/show_logo.png" width="20"></span></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="et-down fa fa-2x fa-user-secret"><br></i></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="ajuda.html">Regras</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php">Sair</a></li>
                        </ul>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <i class="fa fa-3x fa-fw fa-gears"></i>
                        <h1>Administrador</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center text-primary">Gerenciar</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="section">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h2 class="text-success">Professores</h2>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            require_once "conecta.php" ;

                                            $sql = "SELECT * FROM Professor";
                                            $resultado = mysqli_query($con, $sql);
                                            while ($res = mysqli_fetch_array($resultado)) {
                                                $nomeProfessor  = $res['Nome'];
                                                $emailProfessor = $res['Email'];
                                                echo "<tr>
                                                    <td>$nomeProfessor</td>
                                                    <td>$emailProfessor</td>
                                                    <td><a href='excluir/excluirProfessor?email=$emailProfessor' class='btn btn-danger btn-xs'>Excluir</a></td>
                                                </tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h2 class="text-info">Alunos</h2>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Email</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            require_once "conecta.php" ;

                                            $sql = "select * from Jogador";
                                            $resultado = mysqli_query($con, $sql);
                                            while ($res = mysqli_fetch_array($resultado)) {
                                                $nome  = $res['Nome'];
                                                $email = $res['Email'];
                                                echo "<tr>
                                                    <td>$nome</td>
                                                    <td>$email</td>
                                                    <td><a href='excluir/excluirAluno?email=$email' class='btn btn-danger btn-xs'>Excluir</a></td>
                                                </tr>";
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                            require_once "conecta.php" ;

                            $sql_partida = "select * from Jogo";
                            $resultado_partida = mysqli_query($con, $sql_partida);
                            $index = 1;
                            while ($res = mysqli_fetch_array($resultado_partida)) {
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
                      <td><a href='excluir/excluirJogo?nome=$nome' class='btn btn-danger btn-xs'>Excluir</a></td>

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


</body></html>