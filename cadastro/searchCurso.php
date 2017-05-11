<?php
    require "../conecta.php";

    $area = $_POST['area'];
    $area = trim($area);

    $sql_curso = "select Descricao_Curso from Curso where Grande_Area = '$area'";
    $resultado_curso = mysqli_query($con, $sql_curso);
    $existe_curso = mysqli_num_rows($resultado_curso);
    $value = "";


    if ($existe_curso > 0) {
        while($res = mysqli_fetch_array($resultado_curso)) {
            $value .= $res['Descricao_Curso'] . ", ";
        }
        echo $value;
    } else {
        echo "Nenhum Curso Cadastrado";
    }


?>