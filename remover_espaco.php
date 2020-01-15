<?php
	//abre conexao ao servidos MySQL
	include "conexao.php";
?>

<?php
	// pega o ID da URL
	$id = isset($_GET['id']) ? $_GET['id'] : null;
	 
	// valida o ID
	if (empty($id))
	{
	    echo "ID não informado";
	    exit;
	}
	 
	// remove do banco
	$sql = "DELETE FROM espaco WHERE id = {$id}";

    $exclusao = mysqli_query($conecta,$sql);
        
	if (!$exclusao) {
        die("Registro não excluído");
    } else {
        header("location:espacos.php");
    }
	 
	
    // Consulta a tabela de Login
    $consulta = "SELECT * FROM espaco ";
    
    if(isset($_GET["id"]) ) {
        $id = $_GET["id"];
        $consulta .= "WHERE id = {$id} ";
    }

    $con_espaco = mysqli_query($conecta,$consulta);
    if (!$con_espaco) {
        die("Erro na consulta");
    }
    $linha = mysqli_fetch_assoc($con_espaco);

 /*Referëncia: http://blog.ultimatephp.com.br/sistema-de-cadastro-php-mysql-pdo/*/
?>