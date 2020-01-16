<?php	

	include_once("conexao.php");

	  $html = '<br><table class="table table-hover">';
      $html .= "<tr>";
      $html .= "<th align=center><h4> Evento/Aula </h4></th>"; 
      $html .= "<th align=center><h4> Espaço </h4></th>"; 
      $html .= "<th align=center><h4> Data </h4></th>";
      $html .= "<th align=center><h4> Horário </h4></th>";
      $html .= "<th align=center><h4> Local </h4></th>"; 
      $html .= "<th align=center><h4> Responsável </h4></th>";
      $html .= "<th align=center><h4> Detalhe </h4></th>";              
      $html .= "</tr>";
      $html .= "<body>";	


	$result_transacoes = "SELECT hr.EventoAula, e.espaco, hr.dia, hr.horario, e.endereco, hr.responsavel, hr.detalhe FROM historicoreserva hr inner join espaco e on hr.espaco = e.espacoID and hr.endereco = e.espacoID ";
	$resultado_trasacoes = mysqli_query($conecta, $result_transacoes);
	
	while($resultado = mysqli_fetch_assoc($resultado_trasacoes)){
	  $html .= "<tr>";  
      $html .= "<th>" . $resultado ["EventoAula"] . "</th>";
      $html .= "<td>" . $resultado ["espaco"] . "</td>";
      $html .= "<td>" . $resultado ["dia"] . "</td>";
      $html .= "<td>" . $resultado ["horario"] . "</td>";
      $html .= "<td>" . $resultado ["endereco"] . "</td>";
      $html .= "<td>" . $resultado ["responsavel"] . "</td>";
      $html .= "<td>" . $resultado ["detalhe"] . "</td>"; 	
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
	$dompdf->load_html(' <h1 style="text-align: center;"> Histórico de Reservas </h1>	' . $html .'
		');


	//Renderizar o html
	$dompdf->render();

	//Exibir a página
	$dompdf->stream(
		"Histórico de Reservas de Espaço.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
