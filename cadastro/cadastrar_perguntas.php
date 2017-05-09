<?php


    require "../conecta.php";

    $curso              = $_POST['curso'];
    $disciplina         = $_POST['disciplina'];
    $assunto            = $_POST['assunto'];
    $visibilidade       = $_POST['visibilidade'];
    $area               = $_POST['area'];
    $corretas_array    = $_POST['corretas_array'];
    $perguntas_array    = $_POST['perguntas_array'];
    $alternativas_array = $_POST['alternativas_array'];

    $saida = false;
    $erros = "";

    for($i = 0; $i < count($perguntas_array); $i++){
        $sql = "INSERT INTO Perguntas (Enunciado, Respostas, Jogo_idJogo) VALUES
                ('$perguntas_array[$i]','$corretas_array[$i]',1)";
        $insert = mysqli_query($con, $sql);
        if ($insert) {
           $saida = true;
        } else {
            $erros += "erro em [".$i."]: ".mysqli_error($con);
        }
}
if($saida){
    echo "inseriu";
}else{
    echo $erros;
}



?>