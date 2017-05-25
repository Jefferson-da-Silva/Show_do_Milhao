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
    <title>Editar Perguntas</title>
    <link rel="icon" href="../img/show_logo.png" />
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
                    <a href="../login.html">Show do Milhão <img src="../img/show_logo.png" width="20"></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div align="center">
                <i class="fa fa-5x fa-fw fa-user"></i>
            </div>
            <div class="col-md-12" align="center">
                <h1>Editar Perguntas</h1>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="POST" action="atualizar_perguntas.php">
                    <?php

                    require_once "../conecta.php" ;
                    session_start();

                    $nome_jogo = $_GET['valor'];

                    $sql_jogo = "SELECT * FROM Jogo WHERE Descricao_Jogo = '$nome_jogo'";
                    $res_jogo  =  mysqli_query($con, $sql_jogo);
                    $res = mysqli_fetch_array($res_jogo);
                    $id_Jogo = $res['idJogo'];

                    $sql_perguntas = "SELECT * FROM Perguntas WHERE 	Jogo_idJogo  = '$id_Jogo'";
                    $res_perguntas = mysqli_query($con, $sql_perguntas);

                    $index = 1;
                    while ($res = mysqli_fetch_array($res_perguntas)) {
                        $perguntas = $res['Enunciado'];


                        echo"<div class='form-group'>
                        <label class='control-label' for='exampleInputNome'>Perguntas:</label>
                        <input class='form-control' id='exampleInputNome' name='cadastro_input_nome' value='$perguntas' type='text'>
                    </div>";
                        $index++;
                    }
                    ?>
                    <button type="submit" name="botao_cadastro" class="btn btn-success">Alterar
                        <i class="fa fa-fw fa-floppy-o"></i>
                    </button>
                </form>

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
<!-- Input Mask-->
<script src="../js/plugins/jasny/jasny-bootstrap.min.js"></script>


</body></html>