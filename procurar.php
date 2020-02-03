
<?php
  //abre conexao ao servidos MySQL
  include "conexao.php";
?>

<?php

    // Determinar localidade BR
    setlocale(LC_ALL, 'pt_BR');

    // Consulta ao banco de dados
    $usuarios = "SELECT id, NomeCompleto, usuario, senha ";
    $usuarios .= "FROM usuario ";
    if ( isset($_GET["pesquisar"]) ) {
        $login = $_GET["pesquisar"];
        $usuarios .= "WHERE NomeCompleto LIKE '%{$login}%' ";
    }
    $resultado = mysqli_query($conecta, $usuarios);
    if(!$resultado) {
        die("Falha na consulta ao banco");   
    }
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Procurar Login</title>

  <link rel="stylesheet" href="css/styleProcurar.css">
  <!-- Link Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link rel="stylesheet" href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css">
  <link rel="stylesheet" href="css/bootnavbar.css">

<!-- Image and text -->               <!-- https://color.adobe.com/pt/create -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #98FCFF;"> 

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
      <li class="nav-item active">
        <a class="nav-link" href="Login.php">Login</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="espacoprincipal.php">Espaços</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="comousar.php">Como Usar</a>
      </li>

    </ul>
  </div>

</nav>

</head>

<body>

<br>
<br>
<center>
  <label>
    <h3> 
      Procurar Login
    </h3>
  </label>
</center>

<main>
    <div id="janela_pesquisa">
      <form action="procurar.php" method="GET">
        <center>
            <input type="text" name="pesquisar" placeholder="Pesquisa" class="form-control">
        </center>
            <input type="image"  src="img/botao_search.png" width="40" height="40">
      </form>
    </div>
</main>    

<?php
  if ( !isset($login)) {
?>

<?php
  //echo "Nenhum Resultado Encontrado !!!";
}  else {
?>

<?php
  while($linha = mysqli_fetch_assoc($resultado)) 
  {    
?>
    <ul>
      <li><h5><?php echo $linha["NomeCompleto"] ?></h5></li>
      <li>Usuario: <?php echo $linha["usuario"] ?></li>
      <li>Senha: <?php echo $linha["senha"] ?></li>
    </ul>
<?php
  } // FIM do WHILE
?>

<?php    
  } // FIM do ELSE
?>
<!--
<?php
    while ($resultado = mysqli_fetch_assoc($query))
    {
      //echo $resultado ["espacoID"] ;
      echo $resultado ["NomeCompleto"] ;
      echo $resultado ["usuario"] ;
      echo $resultado ["senha"] ;
    }
?>           
-->

</body>
</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>