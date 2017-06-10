<html>
<?php
require_once "../conecta.php";
session_start();

$emailLogado = $_SESSION['email'];

$sql_jogador        = "SELECT * FROM Jogador WHERE Email = '$emailLogado'";
$resultado_jogador  = mysqli_query($con, $sql_jogador);
$res_jogador        = mysqli_fetch_array($resultado_jogador);
$idJogador          = $res_jogador['idJogador'];


$idJogo = $_GET['jogo'];
$sql_jogo          = "SELECT * FROM Jogo WHERE idJogo ='$idJogo'";
$resultado_jogo    = mysqli_query($con, $sql_jogo);
$res_jogo          = mysqli_fetch_array($resultado_jogo);
$id_jogo           = $res_jogo['idJogo'];
$id_curso          = $res_jogo['Curso_idCurso'];

$sql_perguntas = "SELECT * FROM Perguntas WHERE Jogo_idJogo = '$id_jogo'";

$resultado_perguntas = mysqli_query($con, $sql_perguntas);

while ($res_perguntas = mysqli_fetch_array($resultado_perguntas)) {
    $enunciado_array[] = $res_perguntas['Enunciado'];
    $resposta_correta[] = $res_perguntas['RespostaCorreta'];
    $alternativa_1[] = $res_perguntas['Alternativa_1'];
    $alternativa_2[] = $res_perguntas['Alternativa_2'];
    $alternativa_3[] = $res_perguntas['Alternativa_3'];
    $alternativa_4[] = $res_perguntas['Alternativa_4'];
    $alternativa_5[] = $res_perguntas['Alternativa_5'];
    $id[] = $res_perguntas['idPerguntas'];


}

$id = implode("|", $id);
$enunciado_array = implode("|", $enunciado_array);
$resposta_correta = implode("|", $resposta_correta);
$alternativa_1 = implode("|", $alternativa_1);
$alternativa_2 = implode("|", $alternativa_2);
$alternativa_3 = implode("|", $alternativa_3);
$alternativa_4 = implode("|", $alternativa_4);
$alternativa_5 = implode("|", $alternativa_5);

echo"<script>

         var data = new Date();



        var dia    = data.getDate();
        var mes     = data.getMonth();
        var ano4    = data.getFullYear();
        var hora    = data.getHours();
        var min     = data.getMinutes();
        var seg     = data.getSeconds();

        var str_data = dia + '/' + (mes+1) + '/' + ano4;
        console.log (str_data);

        var enunciados;
        var resposta_certa;
        var alternativas_1;
        var alternativas_2;
        var alternativas_3;
        var alternativas_4;
        var alternativas_5;
        var hasClicked = false;
        var cartas = 1;
        var pulo = 1;
        var indiceAtual;
        var indiceAcertou;
        var indiceErrou;
        var indiceParou;
        var premio =[         'R$ 1 mil', 	'R$ 0', 	'R$ 0',
                         	'R$ 2 mil', 	'R$ 1 mil', 	'R$ 500',
                         	'R$ 3 mil', 	'R$ 2 mil', 	'R$ 1 mil',
                         	'R$ 4 mil', 	'R$ 3 mil', 	'R$ 1.5 mil',
                         	'R$ 5 mil', 	'R$ 4 mil', 	'R$ 2 mil',
                         	'R$ 10 mil', 	'R$ 5 mil', 	'R$ 2.5 mil',
                         	'R$ 20 mil', 	'R$ 10 mil', 	'R$ 5 mil',
                         	'R$ 30mil', 	'R$ 20 mil', 	'R$ 10 mil',
                         	'R$ 40 mil', 	'R$ 30 mil', 	'R$ 15 mil',
                         	'R$ 50 mil', 	'R$ 40 mil', 	'R$ 20 mil',
                         	'R$ 100 mil', 	'R$ 50 mil', 	'R$ 25 mil',
                         	'R$ 200 mil', 	'R$ 100 mil', 	'R$ 50 mil',
                         	'R$ 300 mil', 	'R$ 200 mil', 	'R$ 100 mil',
                         	'R$ 400 mil', 	'R$ 300 mil', 	'R$ 150 mil',
                         	'R$ 500 mil', 	'R$ 400 mil', 	'R$ 200 mil',
                         	'R$ 1 milhão',	'R$ 500 mil', 	'R$ 0'];
        recebeDados('$enunciado_array','$resposta_correta', '$alternativa_1', '$alternativa_2', '$alternativa_3', '$alternativa_4', '$alternativa_5');


        function recebeDados(enunciado_array, resposta_correta, alternativa_1, alternativa_2, alternativa_3, alternativa_4, alternativa_5){
            enunciados = enunciado_array.split('|');
            resposta_certa = resposta_correta.split('|');
            alternativas_1 = alternativa_1.split('|');
            alternativas_2 = alternativa_2.split('|');
            alternativas_3 = alternativa_3.split('|');
            alternativas_4 = alternativa_4.split('|');
            alternativas_5 = alternativa_5.split('|');

        }


        window.onbeforeunload = function(){
            alert('foi');
        }

        window.onload =  function(){




            indiceAtual = 0;
            indiceAcertou = 0;
            indiceParou = 1;
            indiceErrou = 2;

            document.getElementById('enunciado').innerText = enunciados[indiceAtual];
            document.getElementById('alternativa_1').innerText = alternativas_1[indiceAtual];
            document.getElementById('alternativa_2').innerText = alternativas_2[indiceAtual];
            document.getElementById('alternativa_3').innerText = alternativas_3[indiceAtual];
            document.getElementById('alternativa_4').innerText = alternativas_4[indiceAtual];
            document.getElementById('alternativa_5').innerText = alternativas_5[indiceAtual];

            document.getElementById('acertar').innerText = premio[indiceAcertou];
            document.getElementById('parar').innerText = premio[indiceParou];
            document.getElementById('errar').innerText = premio[indiceErrou];
        }
        function verificarPulo(idpulo){
         if(pulo<=3){
         indiceAtual++;
         pulo ++;
         proximaPerguntaPulo();
         document.getElementById(idpulo).style.display = 'none';
         }
        }

        function verificarCartas(idCartas) {
        if(!hasClicked){
            hasClicked = true;

        if(cartas<=3){
        cartas ++;
        var carta = Math.floor((Math.random() * 4) + 1);
            swal('A carta sorteada foi' , carta  );
        document.getElementById(idCartas).style.display = 'none';
        var alternnativa1 = document.getElementById('alternativa_1').attributes.value.value;
        var alternnativa2 = document.getElementById('alternativa_2').attributes.value.value;
        var alternnativa3 = document.getElementById('alternativa_3').attributes.value.value;
        var alternnativa4 = document.getElementById('alternativa_4').attributes.value.value;
        var alternnativa5 = document.getElementById('alternativa_5').attributes.value.value;

}
        if(!(alternnativa1.localeCompare(resposta_certa[this.indiceAtual]) == 0) && (carta!=0)){
         document.getElementById('divAlternativa1').style.display = 'none';
         carta --;
         }
         if(!(alternnativa2.localeCompare(resposta_certa[this.indiceAtual]) == 0) && (carta!=0)){
         document.getElementById('divAlternativa2').style.display = 'none';
         carta --;
         }
         if(!(alternnativa3.localeCompare(resposta_certa[this.indiceAtual]) == 0) && (carta!=0)){
         document.getElementById('divAlternativa3').style.display = 'none';
         carta --;
         }
         if(!(alternnativa4.localeCompare(resposta_certa[this.indiceAtual]) == 0) && (carta!=0)){
         document.getElementById('divAlternativa4').style.display = 'none';
         carta --;
         }
         if(!(alternnativa5.localeCompare(resposta_certa[this.indiceAtual]) == 0) && (carta!=0)){
         document.getElementById('divAlternativa5').style.display = 'none';
         carta --;
         }


    }else
         swal('Ops!', 'Você ja ultilizou as cartas nessa rodada!' , 'info');
}
        function verificarResposta(respostaEscolhida){
        swal({
                    title: 'Você está certo disso?',
                    text: '',
                    imageUrl: '../img/duvida.png',
                    showCancelButton: true,
                    confirmButtonColor: '#1E90FF',
                    confirmButtonText: 'Sim',
                    cancelButtonText: 'Não',
                    closeOnConfirm: false
                },
                function(isConfirm){
                    if (isConfirm) {
                          if(resposta_certa[indiceAtual] == respostaEscolhida){
                          if(premio[indiceAcertou] == 'R$ 1 milhão'){

                          var diaFim     = data.getDate();
                          var mesFim     = data.getMonth();
                          var ano4Fim    = data.getFullYear();
                          var dataFim    = diaFim + '/' + (mesFim+1) + '/' + ano4Fim;
                          var horasFim    = data.getHours();
                          var minFim     = data.getMinutes();
                          var segFim     = data.getSeconds();
                          var duracao = getDuracao(str_data, dataFim, hora, min, seg, horasFim, minFim, segFim );
                                swal({
                                  title: 'Ganhou',
                                  text: 'Parabéns você ganhou 1 milhão de reais',
                                  imageUrl: '../img/icon_premio.png',
                                  showCancelButton: false,
                                  confirmButtonColor: '#1E90FF',
                                  confirmButtonText: 'OK',
                                  closeOnConfirm: false
                                },
                                function(){
                                       $.post('NOME_PHP_SALVAR_PARTIDA.php', { email_jogador: email,
                                        idJogo: idJogo})
                                        .done(function(resposta) {

                                        });
                                     window.location.assign('../cadastro/ranking.php');
                                });


                              }else
                                swal('Certa Resposta', 'Vamos para proxima pergunta de: ' +premio[indiceAcertou+3], 'success');

                              indiceAtual++;
                              indiceAcertou +=3;
                              indiceParou +=3;
                              indiceErrou +=3;
                              proximaPergunta();
                         }else {
                            alert ('Que pena, Errou', 'error');
                             window.location.assign('../dashboard.php?');
                        }
                    }
                });
        }

        function verificarParar(idParar){
           premioParou[indiceParou];

        }

        function getDuracao(dataInicio, dataFim, horaInicio, minutoInicio, segundoInicio, horaFim, minutoFim, segundoFim ){
            var saida;

                    // Set the unit values in milliseconds.
            var msecPerMinute = 1000 * 60;
            var msecPerHour = msecPerMinute * 60;
            var msecPerDay = msecPerHour * 24;

            // Set a date and get the milliseconds
            var date = new Date(dataInicio);
            date.setHours(horaInicio, minutoInicio, segundoInicio, 0);
            var dateMsec = date.getTime();

            // Set the date to January 1, at midnight, of the specified year.
             var date = new Date(dataFim);
             date.setHours(horaFim, minutoFim, segundoFim, 0);


            // Get the difference in milliseconds.
            var interval = dateMsec - date.getTime();

            // Calculate how many days the interval contains. Subtract that
            // many days from the interval to determine the remainder.
            var days = Math.floor(interval / msecPerDay );
            interval = interval - (days * msecPerDay );

            // Calculate the hours, minutes, and seconds.
            var hours = Math.floor(interval / msecPerHour );
            interval = interval - (hours * msecPerHour );

            var minutes = Math.floor(interval / msecPerMinute );
            interval = interval - (minutes * msecPerMinute );

            var seconds = Math.floor(interval / 1000 );

            // Display the result.
            saida = days + ' dias ' + hours + ' horas, ' + minutes + ' minutos, ' + seconds + ' segundos.';

            //Output: 164 days, 23 hours, 0 minutes, 0 seconds.

            return saida;

        }

        function proximaPergunta(){
             hasClicked = false;

               document.getElementById('divAlternativa1').style.display = 'block';
               document.getElementById('divAlternativa2').style.display = 'block' ;
               document.getElementById('divAlternativa3').style.display = 'block';
               document.getElementById('divAlternativa4').style.display = 'block';
               document.getElementById('divAlternativa5').style.display = 'block';

             document.getElementById('enunciado').innerText = enunciados[indiceAtual];
            document.getElementById('alternativa_1').innerText = alternativas_1[indiceAtual];
            document.getElementById('alternativa_2').innerText = alternativas_2[indiceAtual];
            document.getElementById('alternativa_3').innerText = alternativas_3[indiceAtual];
            document.getElementById('alternativa_4').innerText = alternativas_4[indiceAtual];
            document.getElementById('alternativa_5').innerText = alternativas_5[indiceAtual];

            document.getElementById('acertar').innerText = premio[indiceAcertou];
            document.getElementById('parar').innerText = premio[indiceParou];
            document.getElementById('errar').innerText = premio[indiceErrou];
        }
        function proximaPerguntaPulo(){
            hasClicked = false;

               document.getElementById('divAlternativa1').style.display = 'block';
               document.getElementById('divAlternativa2').style.display = 'block' ;
               document.getElementById('divAlternativa3').style.display = 'block';
               document.getElementById('divAlternativa4').style.display = 'block';
               document.getElementById('divAlternativa5').style.display = 'block';



             document.getElementById('enunciado').innerText = enunciados[indiceAtual];
            document.getElementById('alternativa_1').innerText = alternativas_1[indiceAtual];
            document.getElementById('alternativa_2').innerText = alternativas_2[indiceAtual];
            document.getElementById('alternativa_3').innerText = alternativas_3[indiceAtual];
            document.getElementById('alternativa_4').innerText = alternativas_4[indiceAtual];
            document.getElementById('alternativa_5').innerText = alternativas_5[indiceAtual];


        }
    </script>";

    echo $premioParou = "<script> document.write(premioParou[indiceParou])</script>";

?>


<head>
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
    <script src="../sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../sweetalert/dist/sweetalert.css">
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
                    <a href="../dashboard.php">Inicio</a>
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
                                                    <p class="lead text-justify" id="enunciado">Quais são as cinco alternativas do Programa Show do Milhão?</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12" id="divAlternativa1" style="position:relative;">
                                                <img src="../img/alternativa.png" class="img-responsive padding">
                                             <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                                                    <a href="#" style="text-decoration: none; color: #ffffff" onclick="verificarResposta('alternativa 1')"><p class="lead text-justify" id="alternativa_1" value="alternativa 1">Alternativa 1</p></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="divAlternativa2" style="position:relative;">
                                                <img src="../img/alternativa.png" class="img-responsive img-thumbnail padding">
                                                 <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                                                    <a href="#" style="text-decoration: none; color: #ffffff" onclick="verificarResposta('alternativa 2')"><p class="lead text-justify" id="alternativa_2" value="alternativa 2">Alternativa 2</p></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="divAlternativa3" style="position:relative;">
                                                <img src="../img/alternativa.png" class="img-responsive padding">
                                                <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                                                    <a href="#" style="text-decoration: none; color: #ffffff" onclick="verificarResposta('alternativa 3')"><p class="lead text-justify" id="alternativa_3" value="alternativa 3">Alternativa 3</p></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="divAlternativa4" style="position:relative;">
                                                <img src="../img/alternativa.png" class="img-responsive padding">
                                                <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                                                    <a href="#" style="text-decoration: none; color: #ffffff" onclick="verificarResposta('alternativa 4')">
                                                        <p class="lead text-justify" id="alternativa_4" value="alternativa 4">Alternativa 4</p></a>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="divAlternativa5" style="position:relative;">
                                                <img src="../img/alternativa.png" class="img-responsive img-thumbnail">
                                                <div style="position: absolute; top:10px; left:60px; color:white;" class="col-md-10">
                                                    <a href="#" style="text-decoration: none; color: #ffffff" onclick="verificarResposta('alternativa 5')">
                                                        <p class="lead text-justify" id="alternativa_5" value="alternativa 5">Alternativa 5</p></a>
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
                                            <a href="#"  id="pulo1" onclick="verificarPulo('pulo1')"> <img src="../img/arrow1.png" class="img-responsive" width="100">
                                            <h1 class="text-center text-success" >Pular</h1></a>
                                        </div>
                                        <div class=" col-md-4">
                                            <a href="#"  id="pulo2" onclick="verificarPulo('pulo2')"> <img src="../img/arrow2.png" class="img-responsive" width="100">
                                            <h1 class="text-center text-success" id="pulo2" onclick="verificarPulo('pulo2')">Pular</h1></a>
                                        </div>
                                        <div class=" col-md-4">
                                            <a href="#"  id="pulo3" onclick="verificarPulo('pulo3')"> <img src="../img/arrow3.png" class="img-responsive" width="100">
                                            <h1 class="text-center text-success" id="pulo3" onclick="verificarPulo('pulo3')">Pular</h1></a>
                                        </div>
                                    </div>
                                    <di></di>
                                </div>
                                <div class="section">

                                    <div class="row">
                                        <div class=" col-md-4">
                                        <a href="#"  id="cartas1" onclick="verificarCartas('cartas1')"><img src="../img/cartas.png" class="img-responsive" width="100">
                                        <h1 class="text-danger">Cartas</h1></a>
                                        </div>
                                        <div class=" col-md-4">
                                        <a href="#"  id="cartas2" onclick="verificarCartas('cartas2')"><img src="../img/cartas.png" class="img-responsive" width="100">
                                        <h1 class="text-danger">Cartas</h1></a>
                                    </div>
                                        <div class=" col-md-4">
                                        <a href="#"  id="cartas3" onclick="verificarCartas('cartas3')"><img src="../img/cartas.png" class="img-responsive" width="100">
                                        <h1 class="text-danger">Cartas</h1></a>
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
                                            <p class="lead text-center" id="acertar"> </p>
                                        </div>
                                        <div class="col-md-3 text-center" style="position:relative;">
                                            <img src="../img/premio.png" class="img-responsive" width="260">
                                        </div>
                                        <div class="col-md-2 text-center" style="position: absolute; top:80px; left:310px; color:black;">
                                            <p class="lead text-center" id="parar"></p>
                                        </div>
                                        <div class="col-md-3 text-center" style="position:relative;">
                                            <img src="../img/premio.png" class="img-responsive" width="260">
                                        </div>
                                        <div class="col-md-2 text-center" style="position: absolute; top:80px; left:550px; color:black;">
                                            <p class="lead text-center" id="errar"></p>
                                        </div>
                                        <div class="col-md-3 text-center">

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