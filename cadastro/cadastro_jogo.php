<?php

if ($_POST['opradio']) {
    echo $_POST ['opradio'];
}
else {
    echo "Por favor marque uma opção"<br/>;
}
if(isset($_POST['meucheck'])){
    echo  $_POST['meucheck'];
}
else{
    echo "Por favor marque uma área!"<br/>;
}
if ($_POST['selecionar_curso']) {
  $sel = $_POST ['selecionar_curso']
  echo $sel
}
else {
    echo "Por favor selecione o curso"<br/>;
}
if ($_POST['disciplina']) {
    echo $_POST['disciplina']
}
    echo $_POST ['disciplina'];

?>
