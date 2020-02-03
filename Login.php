
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>

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
<center> <br><br><br>
  
<img src="Icon-User_4.png" width="120" height="120" >

  <br>
  <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }          
  ?>
  <div class="form-group">

    <form action="validarLogin.php" method="post">
    <br><label><h3> Login </h3></label><br>

    <div class="col-2">
      <p><input type="text" name="usuario" placeholder="Usuário" class="form-control"></p>   
    </div>

    <div class="col-2">
      <p><input type="password" name="senha" placeholder="Senha" class="form-control"></p>    
    </div>
  
      <p><button type="submit" class="btn btn-info" name="Enviar">Entrar</button></p>
  
    </form> 
    <font face="Arial" size="3" color="#98FCFF">
      <a href="criarconta.php">Criar Conta</a>
      <label> | </label>
      <a href="procurar.php">Procurar Login</a>
    </font> 
  </div>

</center>
</body>

</html>