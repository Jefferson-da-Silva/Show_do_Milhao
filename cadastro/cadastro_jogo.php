<!DOCTYPE html>
<?php ?>

<?php
if($_GET['dadossalvos'] == "true" ){
    echo " <script type='text/javascript'>
        function startSuccess(){
            swal('Jogo Salvo!', '', 'success');
        };
        window.onload=startSuccess;
        </script>";
}else if($_GET['dadossalvos'] == "false"){
    echo " <script type='text/javascript'>
        function startError(){
            swal('Erro ao tentar salvar jogo!', '', 'error');
        };
        window.onload=startError;
        </script>";
}
?>


<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="../js/ajax/libs/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <!-- Custom Theme Style -->
        <link href="../build/css/custom.css" rel="stylesheet">
        <link href="../css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="../css/page_pingendo.css" rel="stylesheet" type="text/css">
        <link href="../css/plugins/chosen/chosen.css" rel="stylesheet">
        <link href="../css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
        <link href="../css/plugins/iCheck/custom.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

        <script src="../sweetalert/dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../sweetalert/dist/sweetalert.css">



</head><body class="" data-spy="scroll">

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
                    <div align="center">
                        <i class="fa fa-5x fa-fw fa-gamepad"></i>
                    </div>
                    <div class="col-md-12" align="center">
                        <h1>Criar Jogo</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <form role="form" method="" action="">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label">Visibilidade</label>
                                </div>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" id="optradio1">Público</label>
                                <label class="radio-inline">
                                    <input type="radio" name="optradio" id="optradio2">Privado</label>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label">Grande Área</label>
                                </div>
                                <div>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio-grandeArea" id="optradio-grandeArea1">Exatas</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio-grandeArea" id="optradio-grandeArea2">Humanas</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optradio-grandeArea" id="optradio-grandeArea3">Saúde</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Curso</label>

                                <select class="chosen-select form-control" name="selecionar_curso" id="selecionar_curso" tabindex="2">
                                    <option value="">Selecione o curso</option>
                                    <?php
                                    require_once "../conecta.php" ;

                                    $sql_curso = "select * from Curso";
                                    $resultado_curso = mysqli_query($con, $sql_curso);

                                    while ($res = mysqli_fetch_array($resultado_curso)) {
                                        $value = $res['Descricao_Curso'];
                                        echo "
                                        <option value='$value'>$value</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <a class="btn btn-danger btn-sm" data-toggle="modal" href="#modalCurso">Cadastre um curso
                  <i class="fa fa-fw fa-plus"></i></a>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Disciplina</label>
                                <?php

                                ?>
                                <select class="chosen-select form-control" id="selecionar_disciplina" tabindex="2">
                                    <option value="">Selecione a disciplina</option>
                                    <?php
                                    require_once "../conecta.php" ;

                                    $sql_curso = "select * from Disciplina";
                                    $resultado_curso = mysqli_query($con, $sql_curso);

                                    while ($res = mysqli_fetch_array($resultado_curso)) {
                                        $value = $res['Descricao_Disciplina'];
                                        echo "
                                        <option value='$value'>$value</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <a class="btn btn-danger btn-sm" data-toggle="modal" href="#modalDisciplina">Cadastre uma disciplina
                  <i class="fa fa-fw fa-plus"></i></a>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Assunto</label>
                                <select class="chosen-select form-control" name="selecionar_assunto"  id="selecionar_assunto" tabindex="2">
                                    <option value="">Selecione o assunto</option>
                                    <?php
                                    require_once "../conecta.php" ;

                                    $sql_curso = "select * from Assunto";
                                    $resultado_curso = mysqli_query($con, $sql_curso);

                                    while ($res = mysqli_fetch_array($resultado_curso)) {
                                        $value = $res['Descricao_Assunto'];
                                        echo "
                                        <option value='$value'>$value</option>";
                                    }
                                    ?>
                                </select>
                                <br>
                                <a class="btn btn-danger btn-sm" data-toggle="modal" href="#modalAssunto">Cadastre um assunto
                  <i class="fa fa-fw fa-plus"></i></a>
                            </div>
                            <a class="btn btn-block btn-primary btn-sm" data-toggle="modal" href="#modalPergunta">Cadastrar perguntas  <i class="fa fa-fw fa-list-alt"></i></a>
                            <br>

                        </form>
                    </div>
                    <div class="col-md-5" align="center">
                        <img src="../img/ops.png" class="center-block img-responsive img-rounded" width="300">
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"></div>
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
        <div class="modal fade" id="modalPergunta">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Cadastrar Perguntas</h4>
                    </div>
                    <div class="modal-body">
                        <?php require "form_perguntas.php";?>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalCurso">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Cadastrar um Curso</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="cadastrar_curso.php">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Nome do Curso</label>
                                <input class="form-control" name="nome_do_curso" placeholder="Digite o nome do curso" type="text">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="botao_cadastrar_curso">Cadastrar
                                    <i class="fa fa-fw fa-save"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalDisciplina">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Cadastrar uma Disciplina</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="cadastrar_disciplina.php">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Nome da disciplina</label>
                                <input class="form-control" name="nome_da_disciplina" placeholder="Digite o nome da disciplina" type="text">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="botao_cadastrar_disciplina" contenteditable="true">Cadastrar
                                    <i class="fa fa-fw fa-save"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalAssunto">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Cadastrar um Assunto</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" action="cadastrar_assunto.php">
                            <div class="form-group">
                                <label class="control-label" for="exampleInputEmail1">Nome do Assunto</label>
                                <input class="form-control" id="exampleInputEmail1" name="nome_do_assunto" placeholder="Digite o nome do Assunto" type="text">
                            </div>
                            <div class="modal-footer">
                                <button contenteditable="true" type="submit" class="btn btn-success" name="botao_cadastrar_assunto">Cadastrar
                                    <i class="fa fa-fw fa-save"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
        <!-- jQuery -->
        <script src="../vendors/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="../vendors/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="../vendors/nprogress/nprogress.js"></script>
        <!-- jQuery Smart Wizard -->
        <script src="../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../build/js/custom.min.js"></script>
        <!-- jQuery Smart Wizard -->
        <script>
            $(document).ready(function() {
                        $('#wizard').smartWizard();
            
                        $('#wizard_verticle').smartWizard({
                            transitionEffect: 'slide'
                        });
            
                        $('.buttonNext').addClass('btn btn-success');
                        $('.buttonPrevious').addClass('btn btn-primary');
                        $('.buttonFinish').addClass('btn btn-default');
                    });
        </script>
        <!-- /jQuery Smart Wizard -->
    

</body></html>