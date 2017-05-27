<?php

require "../conecta.php";




if(isset($_POST['botao_alterar'])) {

    for ($i = 1; $i < 20; $i++) {
        $corretas_array[$i] = $_POST['optradio_pergunta' . $i];
        $perguntas_array[$i] = $_POST['texto-pergunta' . $i];
        $alternativas1_array[$i] = $_POST['input_alternativa1_' . $i];
        $alternativas2_array[$i] = $_POST['input_alternativa2_' . $i];
        $alternativas3_array[$i] = $_POST['input_alternativa3_' . $i];
        $alternativas4_array[$i] = $_POST['input_alternativa4_' . $i];
        $alternativas5_array[$i] = $_POST['input_alternativa5_' . $i];
        $id_pergunta[$i] = $_POST['id_perguntas_input' . $i];
    }


    for ($i = 1; $i < 20; $i++) {

        $sql = "update Perguntas set
                            Enunciado = '$perguntas_array[$i]',
                            RespostaCorreta = '$corretas_array[$i]',
                            Alternativa_1 = '$alternativas1_array[$i]',
                            Alternativa_2 = '$alternativas2_array[$i]',
                            Alternativa_3 = '$alternativas3_array[$i]',
                            Alternativa_4 = '$alternativas4_array[$i]',
                            Alternativa_5 = '$alternativas5_array[$i]'
                                WHERE idPerguntas = '$id_pergunta[$i]'";


        $insert = mysqli_query($con, $sql);
        header("Location: meus_jogos.php?");

    }
}

        if(isset($_POST['botao_excluir'])) {
            $nome_jogo = $_POST['nome_jogo'];
            $sql_jogo= "SELECT * FROM Jogo WHERE Descricao_Jogo ='$nome_jogo' ";
            $res_jogo  =  mysqli_query($con, $sql_jogo);
            $res = mysqli_fetch_array($res_jogo);
            $idJogo = $res['idJogo'];

            $sql_del_perguntas = "DELETE FROM Perguntas WHERE Jogo_idJogo = $idJogo ";
            mysqli_query($con, $sql_del_perguntas);


            $sql_del = "DELETE FROM Jogo WHERE Descricao_Jogo ='$nome_jogo'";
            mysqli_query($con, $sql_del);
            header("Location: meus_jogos.php?");
            echo mysqli_error($con);

        }

?>