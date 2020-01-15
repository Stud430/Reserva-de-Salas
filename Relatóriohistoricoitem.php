<?php	

	include_once("conexao.php");

	  $html = '<br><table class="table table-hover">';
      $html .= "<tr>";
      $html .= "<th align=center><h4> Item </h4></th>";
	  $html .= "<th align=center><h4> Quantidade </h4></th>";
      $html .= "<th align=center><h4> Entregue a </h4></th>";
      $html .= "<th align=center><h4> Evento/Aula </h4></th>";
      $html .= "<th align=center><h4> Responsavel </h4></th>";
      $html .= "<th align=center><h4> Dia </h4></th>";
      $html .= "<th align=center><h4> Horário </h4></th>";
      $html .= "<th align=center><h4> Devoluçäo </h4></th>";               
      $html .= "</tr>";
      $html .= "<body>";	


	$result_transacoes = "
	SELECT i.item, r.EventoAula, r.responsavel, r.dia, r.horario, ri.nome, ri.quantidade,  ri.devolucao 
    FROM item i 
    inner join historicoitem hi on i.id=hi.item 
    inner join reservas r on r.id=hi.EventoAula and r.id=hi.responsavel and r.id=hi.dia and r.id=hi.horario 
    inner join reserva_item ri on ri.id=hi.nome and ri.id=hi.quantidade and ri.id=hi.devolucao";

	$resultado_trasacoes = mysqli_query($conecta, $result_transacoes);
	
	while($resultado = mysqli_fetch_assoc($resultado_trasacoes)){
	 $html .= "<tr>";
	 $html .= "<td>" . $resultado ["item"] . "</td>";
	 $html .= "<td>" . $resultado ["quantidade"] . "</td>";
	 $html .= "<td>" . $resultado ["nome"] . "</td>";
	 $html .= "<td>" . $resultado ["EventoAula"] . "</td>";
	 $html .= "<td>" . $resultado ["responsavel"] . "</td>";
	 $html .= "<td>" . $resultado ["dia"] . "</td>";
	 $html .= "<td>" . $resultado ["horario"] . "</td>";
	 $html .= "<td>" . $resultado ["devolucao"] . "</td>"; 
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
	$dompdf->load_html('<h1 style="text-align: center;"> Histórico de Itens Reservados </h1>' . $html .'
		');


	//Renderizar o html
	$dompdf->render();

	//Exibir a página
	$dompdf->stream(
		"Histórico de Reservas de Itens.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>
