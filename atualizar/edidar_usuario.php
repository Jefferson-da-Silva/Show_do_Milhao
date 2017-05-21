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
                <form role="form" method="POST" action="gerenciar_usuario.php">


                    <?php
                    require_once "../conecta.php" ;
                    session_start();
                    $profissao = $_SESSION['profissao'];

                    $mostrar;
                    $emailLogado = $_SESSION['email'];
                    if ($profissao == "aluno") {
                        $sql_nome = "SELECT * FROM Jogador WHERE Email = '$emailLogado'";

                        $mostrar = "false";
                    }if($profissao == "professor") {
                        $sql_nome = "SELECT * FROM Professor WHERE Email = '$emailLogado'";

                        $mostrar = "true";
                    }
                    $res_nome  =  mysqli_query($con, $sql_nome);
                    $res = mysqli_fetch_array($res_nome);


                    $nome = $res['Nome'];
                    $cpf = $res['CPF'];
                    if($mostrar == "true") {
                        $curriculo = $res['Curriculo'];
                        $titulo = $res['Titulacao'];
                    }
                    $email = $res{'Email'};
                    $instituicao = $res ['Instituicao'];
                    $senha = $res['Senha'];

                    echo"<div class='form-group'>
                        <label class='control-label' for='exampleInputNome'>Nome</label>
                             <input class='form-control' id='exampleInputNome' name='cadastro_input_nome'  value= '$nome' type='text'>

                    </div>
                    <div class='form-group'>
                        <label class='control-label' for='exampleInputCPF'>CPF</label>


                       <input type='text' class='form-control' id='exampleInputCPF' required='' name='cadastro_input_cpf' data-mask='999.999.999-99' value='$cpf'>

                    </div>
                    <div class='form-group' id='divAluno'>
                        <label class='control-label' for='exampleInputInstituicao'>Instituição</label>

                                  <input class='form-control' id='exampleInputInstituicao' required='' name='cadastro_input_instituicao' value='$instituicao' type='text'>
                    </div>";
                    if($profissao == "professor") {
                        echo" <div class='form-group' id='divProfessor' >



                                 <label class='control-label' for='exampleInputLattes' > Currículo Lattes </label >


                        <input class='form-control' id = 'exampleInputLattes' name = 'cadastro_input_curriculo' value = '$curriculo'  type = 'url' >

                        </div >
                        <div class='form-group' id = 'divTitulo'>
                                <label class='control-label' for='exampleInputTitulo' > Titulo</label >


                           <input class='form-control' id = 'exampleInputTitulo' value = '$titulo' name = 'cadastro_input_titulo' type = 'text' >


                        </div >";
                    }
                    echo " <div class='form-group'>
                        <label class='control-label' for='exampleInputEmail1'>E-mail</label>

                                <input class='form-control' id='exampleInputEmail1' name='cadastro_input_email' value='$email' type='email' required=''>

                    </div>
                    <div class='form-group'>
                        <label class='control-label' for='exampleInputPassword1'>Senha</label>


                        <input class='form-control' id='exampleInputPassword1' minlength='6' maxlength='30' name='cadastro_input_senha' value='$senha' required=''  type='password'>
                    </div>";
                    ?>

                    <div class="form-group">
                        <label class="control-label" for="exampleInputPassword2">Confirmar Senha</label>
                        <input class="form-control" id="exampleInputPassword2" minlength="6" maxlength="30" name="cadastro_input_confirma_senha" required='' placeholder="Confirme a senha" type="password">
                    </div>
                    <button type="submit" name="botao_excluir" class="btn btn-danger">Excluir Dados
                        <i class="fa fa-fw fa-trash-o"></i>
                    </button>
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

