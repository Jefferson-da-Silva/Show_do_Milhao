<!DOCTYPE html>


<html lang="pt-br"><head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../js/ajax/libs/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/page_pingendo.css" rel="stylesheet" type="text/css">
    <link href="../css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
    <script src="../sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../sweetalert/dist/sweetalert.css">
    <title>Jogos Cadastrados</title>
    <link rel="icon" href="../img/show_logo.png" />


    <script>
        function verificarAcesso(email, idJogo, nome, idCurso, idProfessor){
            swal({
                    title: "Jogo Privado",
                    text: "Deseja solicitar acesso?",
                    imageUrl: "../img/cadeado.png",
                    showCancelButton: true,
                    confirmButtonColor: "#1E90FF",
                    confirmButtonText: "Sim",
                    cancelButtonText: "Não",
                    closeOnConfirm: false
                },
                function(){

                    $.post("liberar_acesso.php", { email_jogador: email,
                        idJogo: idJogo,
                        nome_jogo: nome,
                        idCurso: idCurso,
                        idProfessor:idProfessor})
                        .done(function(resposta) {
                             if(resposta =="inseriu")
                            swal("Solicitado", "Aguarde a liberação do professor.", "success");
                             else
                            swal("Erro", "Erro ao tentar solicitar.", "error");
                        });

                });
        }
    </script>

</head><body class="hidden-md hidden-sm hidden-xs" data-spy="scroll">
<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" arfa-expanded="false" contenteditable="true"><i class="et-down fa fa-2x fa-user text-primary"><br></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="../dashboard.php">Inicio</a>
                        </li>
                        <li>
                            <?php session_start(); echo "<a href=../atualizar/gerenciar_usuario.php?email=". $_SESSION['email']." > Editar Dados</a>"; ?>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../logout.php" >Sair</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="lead nav navbar-left navbar-nav">
                <li>
                    <a href="../dashboard.php">Show do Milhão <img src="../img/show_logo.png" width="20"></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div align="center"></div>
            <div class="col-md-12" align="center"></div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">

            <div class="col-md-12" align="center">
                <i class="fa fa-5x fa-fw fa-table"></i>
                <h1>Jogos Cadastrados</h1>

            </div>

        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome do Jogo</th>
                        <th>Curso</th>
                        <th>Instituição</th>
                        <th>Professor</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once "../conecta.php";


                    $emailLogado = $_SESSION['email'];

                    $sql_acesso = "SELECT Status_Acesso FROM Acesso WHERE Jogador_Email = '$emailLogado'";
                    $resultado_acesso = mysqli_query($con, $sql_acesso);
                    $res_acesso = mysqli_fetch_array($resultado_acesso);
                    $status_acesso = $res_acesso['Status_Acesso'];

                    $sql_partida = "select * from Jogo";
                    $resultado_partida = mysqli_query($con, $sql_partida);
                    $index = 1;
                    $Visibilidade_Jogo="";


                    while ($res = mysqli_fetch_array($resultado_partida)) {
                        $nome               = $res['Descricao_Jogo'];
                        $idJogo             = $res['idJogo'];
                        $id_Curso           = $res['Curso_idCurso'];
                        $Visibilidade_Jogo  = $res['Visibilidade_Jogo'];
                        $idProfessor        = $res['Professor_idProfessor'];

                        $sql_curso          = "select * from Curso where idCurso='$id_Curso'";
                        $resultado_curso    = mysqli_query($con, $sql_curso);
                        $res_curso          = mysqli_fetch_array($resultado_curso);
                        $Descricao_Curso    = $res_curso['Descricao_Curso'];

                        $sql_instituicao        = "select * from Professor where idProfessor='$idProfessor'";
                        $resultado_professor    = mysqli_query($con, $sql_instituicao);
                        $res_instituicao        = mysqli_fetch_array($resultado_professor);
                        $Instituicao            = $res_instituicao['Instituicao'];
                        $nome_Professor         = $res_instituicao['Nome'];
                        echo "
                    <tr>
                      <td>$index</td>
                      <td><a href='#' style='text-decoration: none' onclick='visibilidade(\"$Visibilidade_Jogo\",
                                                                           \"$idJogo\",
                                                                           \"$nome\",
                                                                           \"$id_Curso\",
                                                                           \"$idProfessor\")'>$nome</a></td>
                      <td>$Descricao_Curso</td>
                      <td>$Instituicao</td>
                      <td>$nome_Professor</td>
                      </a>
                    </tr>";
                        $index++;

                    }
                    echo '<script>function visibilidade(visivel, idJogo, nome, idCurso, idProfessor){
                    var teste = ""+visivel;
                    var status = "'.$status_acesso.'"
                     if( teste == "Privado" && status ==""){

                        var email = "'.$emailLogado.'";
                        verificarAcesso(email, idJogo, nome, idCurso, idProfessor);
                     }else if(teste =="Publico" || status =="Liberado"){
                        window.location.assign("../jogo/jogo.html");
                        
                     }else if(status == "Solicitado"){
                      swal("Solicitação Pendente", "Aguarde a liberação do professor.", "info");
                     }
                    }</script>';
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Chosen-->
<script src="../js/plugins/chosen/chosen.jquery.js"></script>
<!-- iCheck -->
<script src="../js/plugins/iCheck/icheck.min.js"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        var config = {
            '.chosen-select'           : {},
            '.chosen-select-deselect'  : {allow_single_deselect:true},
            '.chosen-select-no-single' : {disable_search_threshold:10},
            '.chosen-select-no-results': {no_results_text:'Oops, Não encontrei!, tente diferente'},
            '.chosen-select-width'     : {width:"99%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    });
</script>
<footer class="section section-primary">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>Show do milhão
                    <img src="../img/show_logo.png" width="50">
                </h1>
            </div>
            <div class="col-sm-6">
                <p class="text-info text-right">
                    <br>
                    <br>
                </p>
                <div class="row">
                    <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                        <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                        <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                        <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                        <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 hidden-xs text-right">
                        <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                        <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                        <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                        <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body></html>
