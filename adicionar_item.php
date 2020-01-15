<?php 

   include "conexao.php";

   $item = utf8_decode($_POST["item"]);
   $qtd = $_POST["quantidade"];
   $disponivel = $_POST["quantidade"];
   
   $sql = "insert into item (item,quantidade,disponivel) values ('$item','$qtd','$disponivel')";
  
   mysqli_query($conecta, $sql) or die("Erro no Comando SQL: ". mysqli_error($conecta));

   if (mysqli_affected_rows($conecta)==1) {
      echo "<script> alert('Cadastro Realizado com sucesso !!!'); </script>";
      echo "<script> document.location.href = 'cadastrar_item.php'; </script>";
   } else {
      print "Erro ao Cadastrar. Motivo: ".mysqli_error();
   }
*/


mysqli_close($conecta);


/* 
https://www.vivaolinux.com.br/topico/JavaScript/Banco-Dados-+-alert()
*/
   
?>