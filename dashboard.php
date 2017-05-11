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
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    <title>Show do Milhão</title>
    <link rel="icon" href="img/show_logo.png" />

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
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <ul class="lead nav navbar-left navbar-nav">
            <li>
              <a href="#">Show do Milhão <img src="img/show_logo.png" width="20"></a>
            </li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
            <li></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" arfa-expanded="false" contenteditable="true"><i class="et-down fa fa-2x fa-user text-primary"><br></i></a>
                <ul class="dropdown-menu" role="menu">
                <li>
                   <a href=atualizar/alterar_a.php> Editar Dados</a>
                </li>
                 <li class="divider"></li>
                  <li>
                    <a href="logout.php" >Sair</a>
                   </li>
                  </ul>
            </li>
            </ul>

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

    <?php

    if($profissaoLogado == "aluno"){
     echo  " <div class='section''>
      <div class='container'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='section'>
              <div class='container'>
                <div class='row'>
                  <div class='col-md-3' align='center'>
                    <a href='#' style='text-decoration: none'><img src='img/start_game.png' class='img-circle img-responsive' width='200'>
                    <h1 style='font-family: Lobster'>Selecionar Jogo</h1>
                  </a>
                  </div>
                  <div class='col-md-3' align='center'>
                    <a href='cadastro/ranking.php' style='text-decoration: none'><img src='img/icon_ranking.png' class='img-circle img-responsive' width='200'>
                    <h1 style='font-family: Lobster'>Ranking</h1></a>
                  </div>
                  <div class='col-md-3' align='center'>
                    <a href='#' style='text-decoration: none'><img src='img/icon_rules.png' class='img-circle img-responsive' width='200'>
                    <h1 style='font-family: Lobster'>Regras</h1></a>
                  </div>
                  <div class='col-md-3' align='center'>
                    <a href='logout.php' style='text-decoration: none'><img src='img/quit.png' class='img-circle img-responsive' width='200'>
                    <h1 style='font-family: Lobster'>Sair</h1></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";
    }else if($profissaoLogado == "professor"){
        echo  " <div class='section''>
      <div class='container'>
        <div class='row'>
          <div class='col-md-12'>
            <div class='section'>
              <div class='container'>
                <div class='row'>
                  <div class='col-md-3' align='center'>
                    <a href='cadastro/cadastro_jogo.php' style='text-decoration: none'><img src='img/start_game.png' class='img-circle img-responsive' width='200'>
                    <h1 style='font-family: Lobster'>Criar Jogo</h1>
                  </a>
                  </div>
                  <div class='col-md-3' align='center'>
                    <a href='#' style='text-decoration: none'><img src='img/icon_acess.png' class='img-circle img-responsive' width='200'>
                    <h1 style='font-family: Lobster'>Liberar Aluno </h1></a>
                  </div>
                  <div class='col-md-3' align='center'>
                    <a href='#' style='text-decoration: none'><img src='img/icon_rules.png' class='img-circle img-responsive' width='200'>
                    <h1 style='font-family: Lobster'>Regras</h1></a>
                  </div>
                  <div class='col-md-3' align='center'>
                    <a href='logout.php' style='text-decoration: none'><img src='img/quit.png' class='img-circle img-responsive' width='200'>
                    <h1 style='font-family: Lobster'>Sair</h1></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>";

    }
    ?>

    <div class="section" style="display: none">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section">
              <div class="container">
                <div class="row">
                  <div class="col-md-3">
                    <img src="img/start_game.png" class="img-responsive">
                  </div>
                  <div class="col-md-3">
                    <img src="img/icon_ranking.png" class="img-responsive">
                  </div>
                  <div class="col-md-3">
                    <img src="img/icon_rules.png" class="img-responsive">
                  </div>
                  <div class="col-md-3">
                    <img src="img/quit.png" class="img-responsive">
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
          <div class="col-md-12"></div>
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
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12"></div>
        </div>
      </div>
    </div>
    <footer class="section section-primary">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <h1>Show do milhão
              <img src="img/show_logo.png" width="50">
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