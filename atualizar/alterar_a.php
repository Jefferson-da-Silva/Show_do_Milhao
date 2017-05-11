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
            <ul class="nav navbar-nav navbar-right">
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
                <i class="fa fa-5x fa-fw fa-user"></i>
            </div>
            <div class="col-md-12" align="center">
                <h1>Editar Dados</h1>
            </div>
        </div>
    </div>
</div>
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="POST" action="alterar_aluno.php">

                    <div class="form-group">
                        <label class="control-label" for="exampleInputNome">Nome</label>
                        <?php
                        require_once "../conecta.php" ;
                        session_start();
                       $emailLogado = $_SESSION['email'];

                        $sql_nome = "SELECT Nome FROM Jogador WHERE Email = '$emailLogado'";
                        $res_nome  =  mysqli_query($con, $sql_nome);
                        $res = mysqli_fetch_array($res_nome);


                        $nome = $res['Nome'];

                       echo" <input class='form-control' id='exampleInputNome' name='cadastro_input_nome'  value= ' $nome' type='text'>";
                    ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputCPF">CPF</label>

                    <?php
                        require_once "../conecta.php" ;

                        $emailLogado = $_SESSION['email'];

                        $sql_cpf = "SELECT CPF FROM Jogador WHERE Email = '$emailLogado'";
                        $res_cpf  =  mysqli_query($con, $sql_cpf);
                        $res = mysqli_fetch_array($res_cpf);


                         $cpf = $res['CPF'];
                      echo"  <input type='text' class='form-control' id='exampleInputCPF' required='' name='cadastro_input_cpf' data-mask='999.999.999-99' value='$cpf'>"
                    ?>
                    </div>
                    <div class="form-group" id="divAluno">
                        <label class="control-label" for="exampleInputInstituicao">Instituição</label>
                        <?php

                        require_once "../conecta.php" ;

                        $emailLogado = $_SESSION['email'];

                        $sql_instituicao = "SELECT Instituicao FROM Jogador WHERE Email = '$emailLogado'";
                        $res_instituicao  =  mysqli_query($con, $sql_instituicao);
                        $res = mysqli_fetch_array($res_instituicao);


                        $instituicao= $res['Instituicao'];
                       echo" <input class='form-control' id='exampleInputInstituicao' name='cadastro_input_instituicao' value='$instituicao' type='text'>"
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputEmail1">E-mail</label>
                        <?php
                        require_once "../conecta.php" ;

                        $emailLogado = $_SESSION['email'];

                        $sql_email = "SELECT Email FROM Jogador WHERE Email = '$emailLogado'";
                        $res_email  =  mysqli_query($con, $sql_email);
                        $res = mysqli_fetch_array($res_email);


                        $email= $res['Email'];

                      echo " <input class='form-control' id='exampleInputEmail1' name='cadastro_input_email' value='' type='email' required=''>"
                        ?>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputPassword1">Senha</label>
                        <input class="form-control" id="exampleInputPassword1" minlength="6" maxlength="30" name="cadastro_input_senha" placeholder="Digite a sua senha" type="password">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="exampleInputPassword2">Confirmar Senha</label>
                        <input class="form-control" id="exampleInputPassword2" minlength="6" maxlength="30" name="cadastro_input_confirma_senha" placeholder="Confirme a senha" type="password">
                    </div>
                    <button type="submit" name="botao_alterar" class="btn btn-success">Alterar Dados
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

