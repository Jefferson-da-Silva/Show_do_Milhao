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
    <title>Ranking</title>
    <link rel="icon" href="../img/icon_premio2.png" />
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
                            <?php echo '<a href=../atualizar/gerenciar_usuario.php?email='. $_SESSION['email'].' > Editar Dados</a>'; ?>
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
          <div class="col-md-4" align="center">
            <img src="../img/icon_premio2.png" class="img-responsive" width="200">
          </div>
          <div class="col-md-4" align="center">
            <h1>Ranking</h1>
            <i class="fa fa-5x fa-fw fa-table"></i>
          </div>
          <div class="col-md-4" align="center">
            <img src="../img/premio_icon.jpg" class="img-responsive" width="200">
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
                  <th>Jogador</th>
                  <th>Curso</th>
                  <th>Disciplina</th>
                  <th>Instituição</th>
                  <th>Prêmio</th>
                </tr>
              </thead>
              <tbody>
                <?php
                require_once "../conecta.php" ;

                $sql_partida = "select * from Partida";
                $resultado_partida = mysqli_query($con, $sql_partida);
                $index = 1;
                while ($res = mysqli_fetch_array($resultado_partida)) {
                    $value = $res['Pontuacao'];

                    $idjogador = $res['Jogador_idJogador'];
                    $sql_jogador = "select Nome, Instituicao from Jogador where idJogador = '$idjogador' ";
                    $resultado = mysqli_query($con, $sql_jogador);
                    $resultado = mysqli_fetch_array($resultado);
                    $Nome = $resultado['Nome'];
                    $instituicao = $resultado['Instituicao'];

                    $idCurso = $res['Jogo_Curso_idCurso'];
                    $sql_Curso = "select Descricao_Curso from Curso where idCurso = '$idCurso' ";
                    $resultado = mysqli_query($con, $sql_Curso);
                    $resultado = mysqli_fetch_array($resultado);
                    $Descricao_Curso= $resultado['Descricao_Curso'];

                    $sql_Curso = "select Descricao_Disciplina from Disciplina where Curso_idCurso = '$idCurso' ";
                    $resultado = mysqli_query($con, $sql_Curso);
                    $resultado = mysqli_fetch_array($resultado);
                    $Descricao_Disciplina= $resultado['Descricao_Disciplina'];
                    echo "
                    <tr>
                      <td>$index</td>
                      <td>$Nome</td>
                      <td>$Descricao_Curso</td>
                      <td>$Descricao_Disciplina</td>
                      <td>$instituicao</td>
                      <td>$value</td>
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
