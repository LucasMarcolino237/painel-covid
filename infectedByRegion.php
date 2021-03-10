<?php
	require_once __DIR__."\src\phplot.php";

	$url = "https://api.apify.com/v2/key-value-stores/TyToNta7jGKkpszMZ/records/LATEST?disableRedirect=true";
	$data = json_decode(file_get_contents($url));
	$infectedByRegion = $data->infectedByRegion;


	$plot = new PHPlot(750, 450);

	$plot->SetFileFormat("png");

	
	$plot->SetTitle("Infectados por estado");
	$plot->SetXTitle("Estado");
	$plot->SetYTitle("Quantidade de infectados");


	
	$dados = array();
	foreach($infectedByRegion as $state):
		array_push($dados, array($state->state, $state->count));
	endforeach;

	$plot->SetDataValues($dados);

	
	$plot->SetPlotType("bars");

	
	$plot->DrawGraph();
?>