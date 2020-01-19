<?php

	$filenames = array_diff(scandir("files/working/summaries/"), array('..', '.'));
	
	$summaries = array();
	$s = array();
	foreach ($filenames as $filename)
	{
		$file = file_get_contents("files/working/summaries/".$filename);
		$data = json_decode($file, True);
		$id = $data['summary_id'];
		$title = $data['summary_title'];
		$s['summary_id'] = $id;
		$s['summary_title'] = $title;
		$summaries[] = $s;
	}
?>