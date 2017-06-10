<div id="wizard" class="form_wizard wizard_horizontal">

    <ul class="wizard_steps">
        <?php
        for ($i = 0; $i < 20; $i++) {

            echo "<li>
            <a href='#step-$i' style='text-decoration: none'>
                <span class='step_no'>$i</span>
                            <span class='step_desc'>$i<br />
                                          </span>
            </a>
        </li>


            ";

        }


        ?>
    </ul>

    <?php
for ($i = 0; $i < 20; $i++) {

    if($i ==0){
        echo "

    <div id='step-$i'>

        <div class='row'>
          <div class='col-md-12'>
            <h1 class='text-center text-primary'>Peruntas</h1>
          </div>
        </div>
        <div class='row'>
          <div class='col-md-12'>
            <p class='text-center text-primary'>Digite aqui as perguntas.
              <br>São ao todo 19 perguntas para que haja uma margem caso o jogador clique em pular e esgote as alternativas.</p>
          </div>
        </div>
    </div>

";
    }else {
        echo "

    <div id='step-$i'>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputEmail3' class='control-label' >Pergunta</label>
                </div>
                <div class='col-sm-10'>
                    <textarea class='form-control' id='inputextArea$i' placeholder='Pergunta' rows='5' required=''></textarea>
                </div>
            </div>
            <p class='lead text-center text-danger'>Selecione a alternativa correta!</p>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa1' class='control-label'>Alternativa 1</label>
                    <input type='radio' name='optradio_pergunta$i' id='optradio_alrenativa_1_$i' />
                </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' id='inputAlternativa1_$i' placeholder='Alternativa 1' required=''>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa2' class='control-label'>Alternativa 2</label>
                    <input type='radio' name='optradio_pergunta$i'id='optradio_alrenativa_2_$i'>
                </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' id='inputAlternativa2_$i' placeholder='Alternativa 2' required=''>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa3' class='control-label'>Alternativa 3</label>
                    <input type='radio' name='optradio_pergunta$i' id='optradio_alrenativa_3_$i'>
                </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' id='inputAlternativa3_$i' placeholder='Alternativa 3' required=''>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa4' class='control-label'>Alternativa 4</label>
                    <input type='radio' name='optradio_pergunta$i' id='optradio_alrenativa_4_$i'>
                </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' id='inputAlternativa4_$i' placeholder='Alternativa 4' required=''>
                </div>
            </div>
            <div class='form-group'>
                <div class='col-sm-2'>
                    <label for='inputAlternativa5' class='control-label'>Alternativa 5</label>
                    <input type='radio' name='optradio_pergunta$i' id='optradio_alrenativa_5_$i'>
                </div>
                <div class='col-sm-10'>
                    <input type='text' class='form-control' id='inputAlternativa5_$i' placeholder='Alternativa 5' required=''>
                </div>
            </div>


    </div>

";
    }
}
    ?>



</div>
<!-- End SmartWizard Content -->









