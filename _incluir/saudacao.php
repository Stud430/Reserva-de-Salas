<header>
    <div id="header_central">
    	<?php 
    		if (isset($_SESSION["user_portal"])) {
    			$user = $_SESSION["user_portal"];

    			$saudacao = "SELECT NomeCompleto ";
    			$saudacao .= "FROM usuario ";
    			$saudacao .= "WHERE id = {$user} ";

    			$saudacao_login = mysqli_query($conecta,$saudacao);
    			if (!$saudacao_login) {
    				die("Falha no banco");
    			}

    			$saudacao_login = mysqli_fetch_assoc($saudacao_login);
    			$nome = $saudacao_login["NomeCompleto"];
    	?>

    	<div id="header_saudacao">
    		<h5> Bem Vindo, <?php echo $nome; ?> - <a href="Login.html"> Sair </a></h5>
    	</div>

    	<?php 
    		}
    	?>	
        
    </div>
</header>