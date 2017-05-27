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
            <div class='row'>
                <div class='col-md-12'>
                    <p class='text-center text-primary'>Digite aqui as perguntas que deseja editar.
                        <br>São ao todo 19 perguntas para que haja uma margem caso o jogador clique em pular e esgote as alternativas.</p>
                </div>
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

                    echo"<div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputEmail3' class='control-label'>Seu Jogo</label>
                </div>
                <div class='col-sm-10'>
                    <input class='form-control' id='nome_jogo' value='$nome_jogo' name='nome_jogo'  rows='5'/>
                </div>
            </div>";

                    $sql_jogo = "SELECT * FROM Jogo WHERE Descricao_Jogo = '$nome_jogo'";
                    $res_jogo  =  mysqli_query($con, $sql_jogo);
                    $res = mysqli_fetch_array($res_jogo);
                    $id_Jogo = $res['idJogo'];

                    $sql_perguntas = "SELECT * FROM Perguntas WHERE Jogo_idJogo  = '$id_Jogo'";
                    $res_perguntas = mysqli_query($con, $sql_perguntas);

                    $index = 1;
                    while ($res = mysqli_fetch_array($res_perguntas)) {
                        $id_pergunta = $res['idPerguntas'];
                        $enunciado = $res['Enunciado'];
                        $alternativa1 = $res['Alternativa_1'];
                        $alternativa2 = $res['Alternativa_2'];
                        $alternativa3 = $res['Alternativa_3'];
                        $alternativa4 = $res['Alternativa_4'];
                        $alternativa5 = $res['Alternativa_5'];
                        $respostaCerta = $res['RespostaCorreta'];

                        echo "<br/>

                             <input  value='$id_pergunta' name='id_perguntas_input$index' style='display: none' />
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputEmail3' class='control-label'>Pergunta $index</label>
                </div>
                <div class='col-sm-10'>
                    <textarea class='form-control' id='inputextArea$index' name='texto-pergunta$index'  rows='5' required=''>$enunciado </textarea>
                </div>
            </div>
            <p class='lead text-center text-danger'>Selecione a alternativa correta!</p>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa1' class='control-label'>Alternativa 1</label>";
                        if($respostaCerta == "alternativa 1" )
                            echo"<input type='radio' name='optradio_pergunta$index'  value='alternativa 1' checked required='' />";
                        else
                            echo"<input type='radio' name='optradio_pergunta$index'   value='alternativa 1' required='' />";
                        echo" </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' name='input_alternativa1_$index' id='inputAlternativa1_$index' value='$alternativa1' >
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa2' class='control-label'>Alternativa 2</label>";
                        if($respostaCerta == "alternativa 2" )
                            echo"<input type='radio' name='optradio_pergunta$index'   value='alternativa 2' checked required='' />";
                        else
                            echo"<input type='radio' name='optradio_pergunta$index'   value='alternativa 2' required='' />";
                        echo"
                </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' name='input_alternativa2_$index' id='inputAlternativa2_$index' value='$alternativa2' >
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa3' class='control-label'>Alternativa 3</label>";
                        if($respostaCerta == "alternativa 3" )
                            echo"<input type='radio' name='optradio_pergunta$index'   value='alternativa 3' checked required='' />";
                        else
                            echo"<input type='radio' name='optradio_pergunta$index'   value='alternativa 3' required='' />";
                        echo"
                </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' name='input_alternativa3_$index' id='inputAlternativa3_$index' value='$alternativa3' >
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa4' class='control-label'>Alternativa 4</label>";
                        if($respostaCerta == "alternativa 4" )
                            echo"<input type='radio' name='optradio_pergunta$index'   value='alternativa 4' checked required='' />";
                        else
                            echo"<input type='radio' name='optradio_pergunta$index'   value='alternativa 4'  required=''/ >";
                        echo"
                </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' name='input_alternativa4_$index' id='inputAlternativa4_$index' value='$alternativa4' >
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa5' class='control-label'>Alternativa 5</label>";
                        if($respostaCerta == "alternativa 5" )
                            echo"<input type='radio' name='optradio_pergunta$index'   value='alternativa 5' checked required='' />";
                        else
                            echo"<input type='radio' name='optradio_pergunta$index'   value='alternativa 5' required='' />";
                        echo"
                </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' name='input_alternativa5_$index' id='inputAlternativa5_$index' value='$alternativa5' >
                </div>

            </div>



            <br/>

";

                        $index++;
                    }

                    echo"<a href='atualizar_perguntas.php?jogo=$nome_jogo'><a/>";

                    ?>
                    <div id="wizard" class="form_wizard wizard_horizontal">

                        <ul class="wizard_steps">

                        </ul>






                    </div>
                    <!-- End SmartWizard Content -->



                    <button type="submit" name="botao_alterar" class="btn btn-success">Alterar
                        <i class="fa fa-fw fa-floppy-o"></i>
                    </button>
                    <button type="submit" name="botao_excluir" class="btn btn-danger ">Excluir Jogo
                        <i class="fa fa-fw fa-floppy-o"></i>
                    </button>






                </form>
                <?php
                echo"<a href='atualizar_perguntas.php?jogo=$nome_jogo'><a/>";
                ?>
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