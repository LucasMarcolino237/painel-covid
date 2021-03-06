<?php
	require_once __DIR__."\src\phplot.php";

	$url = "https://api.apify.com/v2/key-value-stores/TyToNta7jGKkpszMZ/records/LATEST?disableRedirect=true";
	$data = json_decode(file_get_contents($url));
	$infectedByRegion = $data->infectedByRegion;


	$grafico = new PHPlot(800, 600);

	$grafico->SetFileFormat("png");

	#Indicamos o títul do gráfico e o título dos dados no eixo X e Y do mesmo
	$grafico->SetTitle("Infected by region");
	$grafico->SetXTitle("Eixo X");
	$grafico->SetYTitle("Eixo Y");


	#Definimos os dados do gráfico
	$dados = array();
	foreach($infectedByRegion as $state):
		array_push($dados, array($state->state, $state->count));
	endforeach;

	$grafico->SetDataValues($dados);

	#Neste caso, usariamos o gráfico em barras
	$grafico->SetPlotType("bars");

	#Exibimos o gráfico
	$grafico->DrawGraph();
?>