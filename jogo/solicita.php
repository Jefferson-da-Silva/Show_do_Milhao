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
    <script src="../sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../sweetalert/dist/sweetalert.css">
<script>
        function liberarAcesso(id_acesso){

            $.post("update_acesso.php", { idAcesso: id_acesso}).done(function(resposta) {
                    if(resposta =="Liberado")
                        swal({
                                title: "Aluno Liberado",
                                text: "",
                                imageUrl: "../img/cadeado.png",
                                showCancelButton: false,
                                confirmButtonColor: "#1E90FF",
                                confirmButtonText: "Sim",
                                cancelButtonText: "Não",
                                closeOnConfirm: false
                            },
                            function(){
                                window.location.replace("solicita.php");
                            });
                    else
                        swal("Erro", "Erro ao liberar", "error");
                });

        }


    </script>
<body class="hidden-md hidden-sm hidden-xs" data-spy="scroll">
  <div class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="collapse navbar-collapse" id="navbar-ex-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="../dashboard.php">Inicio</a>
          </li>
        </ul>
        <ul class="lead nav navbar-left navbar-nav">
          <li>
            <a href="../dashboard.php">Show do Milhão
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

            <?php
                require "../conecta.php";
                session_start();
                $emailLogado = $_SESSION['email'];

                $sql_professor = "SELECT idProfessor FROM Professor WHERE Email = '$emailLogado'";
                $resultado_prof = mysqli_query($con, $sql_professor);
                $res_prof = mysqli_fetch_array($resultado_prof);
                $id_prof = $res_prof['idProfessor'];

                $sql_acesso = "SELECT * FROM Acesso WHERE Jogo_Professor_idProfessor = '$id_prof' ";
                $resultado_acesso = mysqli_query($con,$sql_acesso);
                while ($res_acesso = mysqli_fetch_array($resultado_acesso)) {
                    $id_acesso = $res_acesso['idAcesso'];
                    $status_acesso = $res_acesso['Status_Acesso'];
                    $id_jogo = $res_acesso['Jogo_idJogo'];
                    $email_aluno = $res_acesso['Jogador_Email'];
                    $id_curso = $res_acesso['Jogo_Curso_idCurso'];

                    $sql_jogo = "SELECT * FROM Jogo WHERE idJogo = '$id_jogo'";
                    $resultado_jogo = mysqli_query($con, $sql_jogo);
                    $res_jogo = mysqli_fetch_array($resultado_jogo);
                    $nome_jogo = $res_jogo['Descricao_Jogo'];

                    $sql_aluno = "SELECT * FROM Jogador WHERE Email = '$email_aluno'";
                    $resultado_aluno = mysqli_query($con, $sql_aluno);
                    $res_aluno = mysqli_fetch_array($resultado_aluno);
                    $nome_aluno = $res_aluno['Nome'];


                    $sql_curso = "Select * From Curso WHERE idCurso = '$id_curso'";
                    $resultado_curso = mysqli_query($con, $sql_curso);
                    $res_curso = mysqli_fetch_array($resultado_curso);
                    $nome_curso = $res_curso['Descricao_Curso'];

                    echo "<tr>
                <td>1</td>
                <td>$nome_jogo</td>
                <td>$nome_aluno</td>
                <td>$email_aluno</td>
                <td>$nome_curso</td>
                <td>

                  <button type='submit' name='botao_negar'  class='btn btn-danger btn-xs'>Negar <i class='fa fa-fw fa-lock'></i> </button>";
                    if($status_acesso =="Solicitado"){
                    echo"
                  <button type='submit' name='botao_liberar' onclick='liberarAcesso($id_acesso)' class='btn btn-success btn-xs'>Liberar <i class='fa fa-fw fa-unlock'></i> </button>";
            }
                    echo"
                </td>
              </tr>";
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