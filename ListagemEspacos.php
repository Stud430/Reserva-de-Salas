<?php	

	include_once("conexao.php");

	  $html = "<br><table border=1 align=center width=50% cellspacing=0 cellpadding=10>";
      $html .= "<tr>";
      $html .= "<th align=center><h4> ID </h4></th>"; 
      $html .= "<th align=center><h4> Tipo </h4></th>";
      $html .= "<th align=center><h4> Espaço </h4></th>";
      $html .= "<th align=center><h4> Local </h4></th>"; 
      $html .= "<th align=center><h4> Capacidade </h4></th>"; 
      $html .= "<th align=center><h4> Descriçäo </h4></th>";
      $html .= "</tr>";      
      $html .= "<body>";	


	$result_transacoes = "SELECT * FROM espaco";
	$resultado_trasacoes = mysqli_query($conecta, $result_transacoes);
	
	while($resultado = mysqli_fetch_assoc($resultado_trasacoes)){
	  $html .= "<tr>";  
      $html .= "<th>" . $resultado ["id"] . "</th>";
      $html .= "<td>" . utf8_encode($resultado ["tipo"]) . "</td>";
      $html .= "<td>" . utf8_encode($resultado ["espaco"]) . "</td>";
      $html .= "<td>" . utf8_encode($resultado ["endereco"]) . "</td>";
      $html .= "<td>" . $resultado ["capacidade"] . "</td>";
      $html .= "<td>" . $resultado ["descricao"] . "</td>";		
	  $html .= "</tr>"; 	
	}
	
    $html .= "</body>";        
    $html .= "</table>";

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Defini o tipo de Papel e sua Orientacao
	$dompdf->setPaper('A4','portrait');

	// Carrega seu HTML
	$dompdf->load_html(' <h1 style="text-align: center;"> Listagem de Espaços Cadastrados </h1>	' . $html .'
		');


	//Renderizar o html
	$dompdf->render();

	//Exibir a página
	$dompdf->stream(
		"Espaços.pdf", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>
