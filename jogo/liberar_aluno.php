<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src="../js/ajax/libs/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="../css/page_pingendo.css" rel="stylesheet" type="text/css">
  <link href="../css/plugins/chosen/chosen.css" rel="stylesheet">
  <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
  <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> </head>

<body class="hidden-md hidden-sm hidden-xs" data-spy="scroll">
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="collapse navbar-collapse" id="navbar-ex-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="#">Inicio</a>
          </li>
        </ul>
        <ul class="lead nav navbar-left navbar-nav">
          <li>
            <a href="#">Show do Milhão
              <img src="../img/show_logo.png" width="20"> </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"> <i class="fa fa-3x fa-fw fa-unlock-alt"></i> </div>
      </div>
      <div class="row">
        <div align="center"></div>
        <div class="col-md-12" align="center">
          <h1>Solicitações
            <br> </h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nome do Jogo</th>
                <th>Nome do Aluno</th>
                <th>Email do Aluno</th>
                <th>Nome do Curso</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>Otto</td>
                <td>
                  <button type="submit" name="botao_excluir" class="btn btn-danger btn-xs">Negar <i class="fa fa-fw fa-lock"></i> </button>
                  <button type="submit" name="botao_excluir" class="btn btn-success btn-xs">Liberar <i class="fa fa-fw fa-unlock"></i> </button>
                </td>
              </tr>
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
            <img src="../img/show_logo.png" width="50"> </h1>
        </div>
        <div class="col-sm-6">
          <p class="text-info text-right">
            <br>
            <br> </p>
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
</body>

</html>