<?php
	//get summary data from the json file
	$json_file = file_get_contents("files/working/summaries/$summ_id.json");

	$data = json_decode($json_file, True);
	
	$summary_title = $data['summary_title'];
	$summary_LSA = $data['summary_LSA'];
	$summary_graph = $data['summary_graph'];
	
	$sources = array();
	
	foreach ($data['summary_sources'] as $source)
	{
		$sources[] = $source;
	}
	
?>