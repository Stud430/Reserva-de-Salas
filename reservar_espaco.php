
<?php
  //abre conexao ao servidos MySQL
  include "conexao.php";
?>

<?php
  //cria consulta SQL
  $query = $conecta->query ("SELECT * FROM espaco");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reservar Espaço</title>

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
      echo "<h2> Espaços Reservados </h2>";
      echo '<br><table class="table table-hover">';
      echo "<thead>";
      echo "<tr>";
      //echo "<th align=center><h4> ID </h4></th>"; 
      echo "<th align=center><h4> Espaço </h4></th>";
      echo "<th align=center><h4> Local </h4></th>"; 
      echo "<th align=center><h4> Capacidade </h4></th>"; 
      echo "<th align=center><h4> Status </h4></th>";
      echo "<th align=center><h4> Açöes </h4></th>";              
      echo "</tr>";
      echo "</thead>";
      echo "<tbody>";

    while ($resultado = mysqli_fetch_assoc($query)){
      echo "<tr>";  
      //echo "<th>" . $resultado ["espacoID"] . "</th>";
      echo "<td>" . $resultado ["espaco"] . "</td>";
      echo "<td>" . $resultado ["endereco"] . "</td>";
      echo "<td>" . $resultado ["capacidade"] . "</td>";
      echo "<td>" . $resultado ["status"] . "</td>";
    ?>

<!--
    <?php
      if($resultado['status'] == 0){ /* INICIO do IF */       
    ?>
    
    <td><center><a class="btn btn-warning" href="ReservarEspaco.php?id=<?php echo $resultado["id"]?>"> Reservar </a></center></td>;
     
    <?php
      } elseif ($resultado['status'] == 1) { /* ELSE  */
    ?>
    
    <td><center><a class="btn btn-outline-danger" href="DevolverEspaco.php?id=<?php echo $resultado["id"]?>"> Devolver </a></center></td>;
    
    <?php
      } /* FIM do IF */
    ?>
-->

<!-- href="ReservarEspaco.php?id=<?php echo $resultado["espacoID"]?>" -->
      <td><center><button class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $resultado['espacoID']?>" >Reservar</button></center></td>

      <div class="modal fade" id="myModal<?php echo $resultado['espacoID']?>">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Cadastrando</h3>
                        <button class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="ReservarEspaco.php" method="post">
                            <div> <!-- ID do Espaco-->
                                <label>ID: <?php echo $resultado['espacoID']?></label>
                                <input type="hidden" name="id" value="<?php echo $resultado['espacoID']?>">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Evento/Aula:</label>
                                <input type="text" class="form-control" id="EventoAula" name="EventoAula">
                            </div>
                            <div class="form-row">
                                <label class="col-form-label">Local:</label>
                                <input type="text" class="form-control" id="local" name="localX" value="<?php echo $resultado['espaco'] ?>" disabled >

                                  <!-- LOCAL ESCONDIDO -->
                                <input type="hidden" class="form-control" id="local" name="local" value="<?php echo $resultado['espaco'] ?>">
                            
                                <label class="col-form-label">Endereço:</label>
                                <input type="text" class="form-control" id="local" name="enderecoX" value="<?php echo $resultado['endereco'] ?>" disabled >
                                
                                   <!-- ENDERECO ESCONDIDO --> 
                                <input type="hidden" class="form-control" id="local" name="endereco" value="<?php echo $resultado['endereco'] ?>">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Dia:</label>
                                <input type="date" class="form-control" id="dia" name="dia">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Horário:</label>
                                <input type="time" class="form-control" id="hora" name="hora">
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Responsável:</label>
                                <input type="text" class="form-control" id="responsavel" name="responsavel">
                            </div>

                            <button type="reset" class="btn btn-warning">
                                Limpar
                            </button>
                            <button type="submit" class="btn btn-success">
                                Salvar
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                            Fechar
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


<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #98FCFF; height: 51px;"></nav>


</html>