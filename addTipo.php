<?php 
   include "conexao.php";

   $tipo = utf8_decode($_POST["tipoespaco"]);
   
   $sql = "insert into tipo (tipo) values ('$tipo')";
  
   mysqli_query($conecta, $sql) or die("Erro no Comando SQL: ". mysqli_error($conecta));

   if (mysqli_affected_rows($conecta)==1) {
      echo "<script> alert('Cadastro Realizado com sucesso !!!'); </script>";
      echo "<script> document.location.href = 'cadastrar_espaco.php'; </script>";
   } else {
      print "Erro ao Cadastrar. Motivo: ".mysqli_error();
   }

mysqli_close($conecta);


/* 
https://www.vivaolinux.com.br/topico/JavaScript/Banco-Dados-+-alert()
*/
   
?>