
<?php 
  include("conexao.php"); 
?>

<?php
  if (isset($_POST['editar'])) {

    $id_espaco = $_POST["espacoID"];
    $espaco = $_POST["ATespaco"];
    $local = $_POST["ATlocal"];
    $capacidade = $_POST["ATcapacidade"];
    $tipos = $_POST["ATtipos"];
    $status = $_POST["status"];


    // Verificando os campos se estao preenchidos
  if(empty($espaco) || empty($local) || empty($capacidade) || empty($tipos)){
        if(empty($espaco)) {
            echo "<font color='red'>Campo espaco Obrigatorio.</font><br/>";
        }
        if(empty($local)) {
            echo "<font color='red'>Campo local Obrigatorio.</font><br/>";
        }
        if(empty($capacidade)) {
            echo "<font color='red'>Campo capacidade Obrigatorio.</font><br/>";
        }
        if(empty($tipos)) {
            echo "<font color='red'>Campo tipos Obrigatorio.</font><br/>";
        }
    } else {
        // Atualizando dados na tabela
        $alterar = "UPDATE espaco SET espaco = '{$espaco}', endereco = '{$local}', capacidade = '{$capacidade}', status = '{$status}', tipo = '{$tipos}' ";
        $alterar .= "WHERE espacoID = '{$id_espaco}' ";

        $alterar = mysqli_query($conecta, $alterar);

        if(!$alterar) 
          {   die("Erro na alteracao");
              //die(mysqli_error('$conecta'));   
          } else {
              echo "<script> alert('Cadastro Realizado com sucesso !!!'); </script>";
              header("location:espacos.php");   
          }
    }
}
?>

<?php
  // Recebe o id do cliente do cliente via GET
  $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

  // Consulta a tabela de transportadoras
    $consulta = "SELECT * ";
    $consulta .= "FROM espaco WHERE espacoID = {$id} ";
        
    $espacos = mysqli_query($conecta,$consulta);

    $linha = mysqli_fetch_assoc($espacos);
?>

<?php
  $lista_tipos = $conecta -> query("SELECT * FROM tipo");
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Atualizar Espaço</title>

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

  <?php include_once("_incluir/saudacao.php"); ?>
  <a class="navbar-brand" href="#">
    <img src="icons-user-settings.png" width="50" height="50" class="d-inline-block align-top" alt="">
  </a>

</nav>

</head>


<body>

<form action="atualizar_espaco.php" method="post">
  <br><label><h3> Atualizar Espaços </h3></label><br>

  <div class="form-row"> 
    <div class="col-2">
      <p>
        <Label>Espaço</Label>
        <input type="text" value="<?php echo utf8_encode($linha["espaco"]) ?>" name="ATespaco" id="ATespaco" placeholder="Sala/Laboratório etc" class="form-control">
      </p>

    </div>

    <div class="col-2">
      <p>
        <Label>Local</Label>
        <input type="text" value="<?php echo utf8_encode($linha["endereco"]) ?>" name="ATlocal" id="ATlocal" placeholder="Local / Endereco" class="form-control">
      </p>    
    </div>
  </div>

  <div class="form-row">
    <div class="col-2">
      <p>
        <Label>Capacidade</Label>
        <input type="text" value="<?php echo $linha["capacidade"] ?>" name="ATcapacidade" id="ATcapacidade" placeholder="Capacidade em Números" class="form-control">
      </p>    
    </div>

    <div class="col-2">
      <p>
        <Label>Tipo</Label><br>
        <select id="ATtipos" name="ATtipos">
        <!--  <option value="disable" selected=""> Escolha uma opcao</option> -->
                        <?php 
                            $meutipo = $linha["tipo"];
                            while($linha = mysqli_fetch_assoc($lista_tipos)) {
                                $tipo_principal = $linha["tipo"];
                                if($meutipo == $tipo_principal) {
                        ?>
                            <option value="<?php echo $linha["tipo"] ?>" selected>
                                <?php echo utf8_encode($linha["tipo"]) ?>
                            </option>
                        <?php
                                } else {
                        ?>
                            <option value="<?php echo $linha["tipo"] ?>" >
                                <?php echo utf8_encode($linha["tipo"]) ?>
                            </option>                        
                        <?php 
                                }
                            }
                        ?>
        </select>
      </p> 
    </div>

<!-- <a class="btn btn-outline-dark" href="cadastrar_tipo.php" role="button">Adicionar Tipo</a> -->

</div>
<!--  
  <p>
    <Label>Descriçäo</Label> <br>
    <textarea type="text" name="descricao" rows="4" cols="50"> 
      <?php echo $descricao ?>  
    </textarea>
  </p>
-->
  <div class="form-row"> 
    <input type="hidden" name="espacoID" id="espacoID" value="<?php echo $linha["espacoID"] ?>">
    <input type="hidden" name="status" id="status" value="<?php echo $linha["status"] ?>">
  </div>

  <div class="form-row">   
    <p>
      <button type="submit" class="btn btn-success" name="editar">Atualizar</button>
      <button type="Reset" class="btn btn-warning" name="limpar">Limpar</button>
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

<?php
    // Fechar conexao
    mysqli_close($conecta);
?>