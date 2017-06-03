<?php
require "../conecta.php";

$id_acesso = $_POST['idAcesso'];

$sql = "update Acesso set
              Status_Acesso = 'Liberado'
              WHERE idAcesso = '$id_acesso' ";

if (mysqli_query($con, $sql)) {
    echo "Liberado";
}else{
    echo "Não Liberou";
}

?>