<?php	

	include_once("conexao.php");

	  $html = '<br><table class="table table-hover">';
      $html .= "<tr>";
      $html .= "<th align=center><h4> ID </h4></th>"; 
      $html .= "<th align=center><h4> Item </h4></th>";
      $html .= "<th align=center><h4> Quantidade </h4></th>";
      $html .= "<th align=center><h4> Em Estoque </h4></th>";
      $html .= "</tr>";      
      $html .= "<body>";	


	$result_transacoes = "SELECT * FROM item";
	$resultado_trasacoes = mysqli_query($conecta, $result_transacoes);
	
	while($resultado = mysqli_fetch_assoc($resultado_trasacoes)){
	  $html .= "<tr>";  
      $html .= "<th align=center>" . $resultado ["id"] . "</th>";
      $html .= "<td align=center>" . utf8_encode($resultado ["item"]) . "</td>";
      $html .= "<td align=center>" . $resultado ["quantidade"] . "</td>";
      $html .= "<td align=center>" . $resultado ["disponivel"] . "</td>";	
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
	$dompdf->load_html(' <h1 style="text-align: center;"> Listagem de Itens Cadastrados </h1>	' . $html .'
		');


	//Renderizar o html
	$dompdf->render();

	//Exibir a página
	$dompdf->stream(
		"Itens Cadastrados.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
