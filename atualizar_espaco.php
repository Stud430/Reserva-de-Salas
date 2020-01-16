
<?php require_once("conexao.php"); ?>

<?php
  // pega o ID da URL
  //$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
  //$id = $_GET['id'];

  // Consulta a tabela Espaco
    $sql = "SELECT * ";
    $sql .= "FROM espaco ";// WHERE id = {$id} ";
   
    if ( isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql .= "WHERE espacoID = {$id}";
    } else {
        $sql .= "WHERE espacoID = 1";
    }

    $espacos = mysqli_query($conecta,$sql);
  
    $linha = mysqli_fetch_assoc($espacos);
?>

<?php

  if(isset($_POST['atualizar']))
{
    $id = $_POST["id"];
    $espaco = $_POST["espaco"];
    $local = $_POST["local"];
    $capacidade = $_POST["capacidade"];
    $tipos = $_POST["tipos"];
    //$descricao = $_POST['descricao'];

    // Verificando os campos se estao preenchidos
    if(empty($espaco) || empty($local) || empty($capacidade) /*|| empty($tipos) || empty($descricao) */) {
        if(empty($espaco)) {
            echo "<font color='red'>Campo Espaço Obrigatorio.</font><br/>";
        }
        if(empty($local)) {
            echo "<font color='red'>Campo Local Obrigatorio.</font><br/>";
        }
        if(empty($capacidade)) {
            echo "<font color='red'>Campo Capacidade Obrigatorio.</font><br/>";
        }
        /*if(empty($tipos)) {
            echo "<font color='red'>Campo Tipo Obrigatorio.</font><br/>";
        }
        if(empty($descricao)) {
            echo "<font color='red'>Campo Descriçäo Obrigatorio.</font><br/>";
        }*/
    } else {
        //atualizado dados na tabela
        $sql = "UPDATE espaco SET espaco = '{$espaco}', endereco = '{$local}', capacidade = '{$capacidade}', tipo = '{$tipos}' WHERE espacoID = '{$id}' ";

        $alterar = mysqli_query($conecta,$sql);

        if (!$alterar) {
          die($alterar);
        } else {
          header("location:espacos.php");
        }
    }
}
?>

<?php
    // Lista tipos
    $consulta = "SELECT * ";
    $consulta .= "FROM tipo order by tipo asc";
    //$consulta .= "WHERE tipoID = '{$id}' ";
    
    $lista_tipos = mysqli_query($conecta, $consulta);
    
    if(!$lista_tipos) {
       die("erro no banco"); 
    }
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
        <input type="text" value="<?php echo $linha["espaco"] ?>" name="espaco" placeholder="Sala/Laboratório etc" class="form-control">
      </p>

    </div>

    <div class="col-2">
      <p>
        <Label>Local</Label>
        <input type="text" value="<?php echo $linha["endereco"] ?>" name="local" placeholder="Local / Endereco" class="form-control">
      </p>    
    </div>
  </div>

  <div class="form-row">
    <div class="col-2">
      <p>
        <Label>Capacidade</Label>
        <input type="text" value="<?php echo $linha["capacidade"] ?>" name="capacidade" placeholder="Capacidade em Números" class="form-control">
      </p>    
    </div>

    <div class="col-2">
      <p>
        <Label>Tipo</Label><br>
        <select id="tipos" name="tipos">
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
        <!--  
          <?php
            $meuespaco = $linha["id"];
            while($linha = mysqli_fetch_assoc($lista_tipos)){
              $tipoprincipal = $linha["id"];
              if ($meuespaco == $tipoprincipal) {
          ?>
                <option value="<?php echo utf8_encode($linha["id"])?>" selected>
                    <?php echo utf8_encode($linha["tipo"]); ?>
                </option>

          <?php 
                } else {
          ?>      

                <option value="<?php echo $linha["id"] ?>">
                   <?php echo utf8_encode($linha["tipo"]) ?>
                </option>

          <?php
              }
            }
          ?>
        -->    
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
  <input type="hidden" name="id" value="<?php echo $linha["espacoID"] ?>">
  <div class="form-row">   
    <p>
      <button type="submit" class="btn btn-success" name="atualizar">Atualizar</button>
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