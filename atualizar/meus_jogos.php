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
    <title>Meus Jogos</title>
    <link rel="icon" href="../img/start_game.png" />
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
                        <li> </li>
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

          </div>
          <div class="col-md-4" align="center">
            <h1>Meus Jogos</h1>
              <i class="fa fa-5x fa-fw fa-gamepad"></i>
          </div>
          <div class="col-md-4" align="center">

          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
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
                      $nome_jogo = $nome;
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
                      $_SESSION['nome'] = $nome;
                      echo "

                    <tr>
                      <td>$index</td>
                      <td>$nome</td>
                      <td>$Descricao_Curso</td>
                      <td>$Instituicao</td>
                      <td>$nome_Professor</td>

                       <td><a href='editar_perguntas.php?valor=$nome_jogo'> <button type='submit' name='botao_excluir' class='btn btn-warning btn-xs'>Editar
                        <i class='fa fa-fw fa-trash-o'></i>
                    </button></a></td>
                     <td><a href='editar_perguntas.php?valor=$nome_jogo'> <button type='submit' name='botao_excluir' class='btn btn-danger btn-xs'>Excluir
                        <i class='fa fa-fw fa-trash-o'></i>
                    </button></a></td>

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
