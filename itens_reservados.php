
<?php
  //abre conexao ao servidos MySQL
  include "conexao.php";
?>

<?php
  //cria consulta SQL
  $query = $conecta->query ("SELECT * FROM reserva_item");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Itens Reservados</title>

	<!-- Link Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://raw.githubusercontent.com/daneden/animate.css/master/animate.css">
	<link rel="stylesheet" href="css/bootnavbar.css">


<!-- Image and text --> 							<!-- https://color.adobe.com/pt/create -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #98FCFF;"> 
  <a class="navbar-brand" href="dashboard.php">
    <img src="icons-espaco.png" width="50" height="50" class="d-inline-block align-top" alt="">
  </a>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
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
          <a class="dropdown-item" href="reservas_realizadas.php">Reservas Realizadas</a>
          <a class="dropdown-item" href="historico_reservas.php">Histórico</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Recursos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="cadastrar_item.php">Cadastrar Item</a> <!-- CRUD Completo -->
          <a class="dropdown-item" href="itens_reservados.php">Itens Reservados</a>
          <a class="dropdown-item" href="historico_item.php">Histórico</a>
        </div>
      </li>

    </ul>
  </div>
  
  <a class="navbar-brand" href="#">
    <img src="icons-user-settings.png" width="50" height="50" class="d-inline-block align-top" alt="">
  </a>

</nav>

</head>


<body>

    <?php

      //executa consulta
      echo "<h2> Itens Reservados </h2>";
      echo '<br><table class="table table-hover">';
      echo "<thead>";
      echo "<tr>";
      echo "<th align=center><h4> Item </h4></th>";
      echo "<th align=center><h4> Quantidade </h4></th>";
      echo "<th align=center><h4> Entregue a </h4></th>";
      echo "<th align=center><h4> Evento/Aula </h4></th>";
      echo "<th align=center><h4> Responsável </h4></th>"; 
      echo "<th align=center><h4> Açöes </h4></th>";              
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

    while ($resultado = mysqli_fetch_assoc($query)){
      echo "<tr>";  
      echo "<td>" . $resultado ["item"] . "</td>";
      echo "<td>" . $resultado ["quantidade"] . "</td>";
      echo "<td>" . $resultado ["nome"] . "</td>";
      echo "<td>" . $resultado ["EventoAula"] . "</td>";
      echo "<td>" . $resultado ["responsavel"] . "</td>";
    ?>

      <td><center><a class="btn btn-warning" href="devolverItem.php?id=<?php echo $resultado["id"]?>">Devolver</a></center></td>
    
    <?php
    echo "</tr>";
    }

    echo "</tbody>";        
    echo "</table>";

    mysqli_close ($conecta);
?>

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