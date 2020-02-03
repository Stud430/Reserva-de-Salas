
<?php require_once("conexao.php"); ?>

<?php 

   $nome = utf8_decode($_POST["nome"]);
   $usuario = utf8_decode($_POST["usuario"]);
   $senha = $_POST["senha"];
     
   $sql = "insert into usuario (NomeCompleto, usuario, senha) values ('$nome','$usuario','$senha')";
  /* 0 = Falso , 1 = Verdadeiro */

   mysqli_query($conecta, $sql) or die("Erro no Comando SQL: ". mysqli_error($conecta));

   if (mysqli_affected_rows($conecta)==1) {
      //echo "<script> alert('Cadastro Realizado com sucesso !!!'); </script>";
      echo "<div class='alert alert-danger' role='alert'>
              Cadastrado com Sucesso !!!
            </div>";
      echo "<script> document.location.href = 'Login.php'; </script>";
   } else {
      print "Erro ao Cadastrar. Motivo: ".mysqli_error();
   }

mysqli_close($conecta);


/* 
https://www.vivaolinux.com.br/topico/JavaScript/Banco-Dados-+-alert()
*/
   
?>
