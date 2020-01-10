
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastrar Espaço</title>

	<!-- Link Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css">
	<link rel="stylesheet" href="css/bootnavbar.css">


<!-- Image and text --> 							<!-- https://color.adobe.com/pt/create -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #98FCFF;"> 
  <a class="navbar-brand" href="#">
    <img src="icons-espaco.png" width="50" height="50" class="d-inline-block align-top" alt="">
  </a>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.html">Dashboard</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Espaços
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="cadastrar_espaco.php">Cadastrar Espaço</a>
          <a class="dropdown-item" href="espacos.php">Espaços</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Reservas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="reservar_espaco.php">Reservar Espaço</a>
          <a class="dropdown-item" href="reservas.php">Reservas Realizadas</a>
          <a class="dropdown-item" href="historico_reservas.php">Histórico</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Recursos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="item.php">Cadastrar Item</a> <!-- CRUD Completo -->
          <a class="dropdown-item" href="reservas_item.php">Itens Reservados</a>
          <a class="dropdown-item" href="historico_item.php">Histórico</a>
        </div>
      </li>

    </ul>
  </div>

  <?php include_once("_incluir/saudacao.php"); ?>
  <a class="navbar-brand" href="#">
    <img src="icons-user-settings.png" width="50" height="50" class="d-inline-block align-top" alt="">
  </a>

</nav>

</head>


<body>
<font>
	Cadastrar Espaços
</font>

<form action="adicionar_espaco.php" method="post">
  <br><label><h3> Cadastrar Espaços </h3></label><br>

  <div class="form-row"> 
    <div class="col-2">
      <p>
        <Label>Espaço</Label>
        <input type="text" name="espaco" placeholder="Sala/Laboratório etc" class="form-control">
      </p>

    </div>

    <div class="col-2">
      <p>
        <Label>Local</Label>
        <input type="text" name="local" placeholder="Local / Endereco" class="form-control">
      </p>    
    </div>
  </div>

  <div class="form-row">
    <div class="col-2">
      <p>
        <Label>Capacidade</Label>
        <input type="text" name="capacidade" placeholder="Capacidade em Números" class="form-control">
      </p>    
    </div>

    <div class="col-2">
      <p>
        <Label>Tipo</Label><br>
        <select>
          <option value="disable" selected=""> Escolha uma opcao</option>
          <option value="sala">Sala</option>
          <option value="lab">Laboratório</option>
        </select>
      </p> 
    </div>

    <button type="submit" class="btn btn-dark">Adicionar Tipo</button>
  </div>
  
  <p>
    <Label>Descriçäo</Label> <br>
    <textarea name="descricao" cols="25" rows="3"></textarea>
  </p>

  <div class="form-row">   
    <p><button type="submit" class="btn btn-success" name="Enviar">Cadastrar</button>
      <button type="Reset" class="btn btn-warning" name="Limpar">Limpar</button>
    </p>
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