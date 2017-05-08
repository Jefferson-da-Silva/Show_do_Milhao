<?php

    $curso              = $_POST['curso'];
    $disciplina         = $_POST['disciplina'];
    $assunto            = $_POST['assunto'];
    $visibilidade       = $_POST['visibilidade'];
    $area               = $_POST['area'];
    $corretas_array    = $_POST['corretas_array'];
    $perguntas_array    = $_POST['perguntas_array'];
    $alternativas_array = $_POST['alternativas_array'];

    foreach($perguntas_array as $pergunta){
    echo $pergunta;
}

return $corretas_array;



?>