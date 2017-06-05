<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="../js/ajax/libs/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/page_pingendo.css" rel="stylesheet" type="text/css">
    <link href="../css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="../css/css_sobrepor.css" rel="stylesheet">
    <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
  </head><body data-spy="scroll" class="hidden-md hidden-sm hidden-xs">
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
            <li class="active">
              <a href="#">Inicio</a>
            </li>
            <li>
              <a href="#">Contato</a>
            </li>
          </ul>
          <ul class="lead nav navbar-left navbar-nav">
            <li>
              <a href="#">Show do Milhão <img src="../img/show_logo.png" width="20"></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div align="center"></div>
          <div class="col-md-12" align="center">
            <div class="section">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="section">
                      <div class="container">
                        <div class="row">
                          <div class="col-md-6" id="divPergunta" style="position:relative;">
                            <img src="../img/pergunta.png" class="backgroud img-responsive padding">
                            <div style="position: absolute; top:20px; left:30px; color:white;" class="col-md-10 text-left">
                            <?php
                              require_once "../conecta.php";
                            session_start();
                              $emailLogado = $_SESSION['email'];
                                $nomeJogo = $_SESSION['Descricao_Jogo'];
                            $sql_jogo = "SELECT * FROM Jogo WHERE Descricao_Jogo='$nomeJogo'";
                            $resultado_jogo    = mysqli_query($con, $sql_jogo);
                            $res_jogo          = mysqli_fetch_array($resultado_jogo);
                            $id_jogo = $res_jogo['idJogo'];

                            $sql_perguntas = "SELECT * FROM Perguntas WHERE Jogo_idJogo = "



                            ?>
                            </div>
                              <p class="lead text-justify">Quais são as cinco alternativas do Programa Show do Milhão?</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="col-md-12" id="divAlternativa1" style="position:relative;">
                            <img src="../img/alternativa.png" class="img-responsive padding">
                            <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                              <p class="lead text-justify">Alternativa 1</p>
                            </div>
                          </div>
                          <div class="col-md-12" id="divAlternativa1" style="position:relative;">
                            <img src="../img/alternativa.png" class="img-responsive img-thumbnail padding">
                            <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                              <p class="lead text-justify">Alternativa 2</p>
                            </div>
                          </div>
                          <div class="col-md-12" id="divAlternativa1" style="position:relative;">
                            <img src="../img/alternativa.png" class="img-responsive padding">
                            <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                              <p class="lead text-justify">Alternativa 3</p>
                            </div>
                          </div>
                          <div class="col-md-12" id="divAlternativa1" style="position:relative;">
                            <img src="../img/alternativa.png" class="img-responsive padding">
                            <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                              <p class="lead text-justify">Alternativa 4</p>
                            </div>
                          </div>
                          <div class="col-md-12" id="divAlternativa1" style="position:relative;">
                            <img src="../img/alternativa.png" class="img-responsive img-thumbnail">
                            <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                              <p class="lead text-justify">Alternativa 5</p>

                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <h1 class="text-center text-primary">Ajudas</h1>
                    </div>
                    <div class="section">
                      <div class="row text-right">
                        <div class=" col-md-4">
                          <img src="../img/arrow1.png" class="img-responsive" width="100">
                          <h1 class="text-center text-success">Pular</h1>
                        </div>
                        <div class=" col-md-4">
                          <img src="../img/arrow2.png" class="img-responsive" width="100">
                          <h1 class="text-center text-success">Pular</h1>
                        </div>
                        <div class=" col-md-4">
                          <img src="../img/arrow3.png" class="img-responsive" width="100">
                          <h1 class="text-center text-success">Pular</h1>
                        </div>
                      </div>
                      <di></di>
                    </div>
                    <div class="section">
                      <div class="row">
                        <div class=" col-md-4">
                          <img src="../img/placas.png" class="img-responsive" width="100">
                          <h1 class="text-success">Placas</h1>
                        </div>
                        <div class="col-md-4">
                          <img src="../img/cartas.png" class="img-responsive" width="100">
                          <h1 class="text-danger">Cartas</h1>
                        </div>
                        <div class="col-md-4">
                          <img src="../img/universitarios.png" class="img-responsive" width="100">
                          <h1 class="text-center text-warning">Convidados</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="section">
                <div class="col-md-12" id="divPremio">
                  <div class="section">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-3 text-center" style="position:relative;">
                          <img src="../img/premio.png" class="img-responsive" width="260">
                        </div>
                        <div class="col-md-2 text-center" style="position: absolute; top:80px; left:65px; color:black;">
                          <p class="lead text-center">100 R$</p>
                        </div>
                        <div class="col-md-3 text-center" style="position:relative;">
                          <img src="../img/premio.png" class="img-responsive" width="260">
                        </div>
                        <div class="col-md-2 text-center" style="position: absolute; top:80px; left:310px; color:black;">
                          <p class="lead text-center">200 R$</p>
                        </div>
                        <div class="col-md-3 text-center" style="position:relative;">
                          <img src="../img/premio.png" class="img-responsive" width="260">
                        </div>
                        <div class="col-md-2 text-center" style="position: absolute; top:80px; left:550px; color:black;">
                          <p class="lead text-center">400 R$</p>
                        </div>
                        <div class="col-md-3 text-center">
                          <img src="../img/parar.png" class="center-block img-circle img-responsive" width="100">
                          <h1 class="text-center text-danger">Parar</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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