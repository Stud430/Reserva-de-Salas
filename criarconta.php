

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Criar Conta</title>

  <link rel="stylesheet" href="css/styleCadastro.css">
  <!-- Link Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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

<form action="cadastrarusuario.php" method="post">

<div class="form-group">

<br>
<br>
<center>
  <label>
    <h3> 
      Criar Conta 
    </h3>
  </label>
</center>
<br>

  <div class="form-row"> 
    <div class="col-2">
      <p>
        <Label>Nome Completo:</Label>
        <input type="text" name="nome" class="form-control">
      </p>

    </div>
  </div>

  <div class="form-row">
    <div class="col-2">
      <p>
        <Label>Usuário:</Label>
        <input type="text" name="usuario" class="form-control">
      </p>    
    </div>
  </div>

  <div class="form-row">
    <div class="col-2">
      <p>
        <Label>Sena:</Label>
        <input type="text" name="senha" class="form-control">
      </p>    
    </div>
</div>

<br>

<center>
  <div class="form-group">   
    <p>
      <button type="submit" class="btn btn-info" name="Enviar">Cadastrar</button>
    </p>
  </div>
</center>

</div>

</form>

<?php include_once("_incluir/rodape.php"); ?>
</body>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="js/bootnavbar.js" ></script>
    <script>
        $(function () {
            $('#main_navbar').bootnavbar();
        })
    </script>

</html>

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>