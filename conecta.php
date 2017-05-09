<?php
  $host = '127.0.0.1:3306';
  $usuario = 'root';
  $senha = '';
  $banco = 'show_do_milhao';

  $con = mysqli_connect('127.0.0.1:3306','root','','show_do_milhao') or die ("sem conexão com o servidor");
  //$con = mysqli_connect($host, $usuario,$senha,$banco);
            //die("Não foi possivel conectar");
  //mysqli_select_db($banco,$con);
      //      die("Não foi possivel selecionar o banco");

 ?>
