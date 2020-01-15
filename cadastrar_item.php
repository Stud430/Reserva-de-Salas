
<?php
  //abre conexao ao servidos MySQL
  include "conexao.php";
?>

<?php
  //cria consulta SQL
  $query = $conecta->query ("SELECT * FROM item");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastrar Item</title>

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
<form action="adicionar_item.php" method="post">
  <br><label><h3> Adicionar Item </h3></label><br>

  <div class="form-row">
    
    <div class="col-2"> 
      <label>Item</label>
      <input type="text" name="item" class="form-control">
    </div> 

    <div class="col-2"> 
      <label>Quantidade</label>
      <input type="text" name="quantidade" class="form-control">
    </div> 
  
    <div class="col-2"> <br>
    <button type="submit" class="btn btn-success" name="Enviar">Inserir</button>
    <button type="Reset" class="btn btn-warning" name="Limpar">Limpar</button>
  </div>
</div>
</form>

<br><hr><br>

<?php

      //executa consulta
      echo "<h2> Itens Cadastrados </h2>";
      echo '<br><table class="table table-hover">';
      echo "<thead>";
      echo "<tr>";
      echo "<th align=center><h4> Item </h4></th>";
      echo "<th align=center><h4> Quantidade </h4></th>";
      echo "<th align=center><h4> Disponível </h4></th>"; 
      echo "<th align=center><h4> Açöes </h4></th>";              
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

    while ($resultado = mysqli_fetch_assoc($query)){
      echo "<tr>";  
      echo "<td>" . utf8_encode($resultado ["item"]) . "</td>";
      echo "<td>" . $resultado ["quantidade"] . "</td>";
      echo "<td>" . $resultado ["disponivel"] . "</td>";
    ?>

      <td><center><button class="btn btn-warning" href="reservarItem.php?id=<?php echo $resultado["id"]?>" data-toggle="modal" data-target="#myModal">Reservar</button></center></td>


        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Cadastrando</h3>
                        <button class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name:</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-form-label">e-mail:</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Mensagem:</label>
                                <textarea class="form-control" id="message-text"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                            Fechar
                        </button>
                        <button class="btn btn-success">
                            Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    echo "</tr>";
    }

    echo "</tbody>";        
    echo "</table>";

    mysqli_close ($conecta);
?>

<button type="button" class="btn btn-outline-dark">Baixar Relatório</button>
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