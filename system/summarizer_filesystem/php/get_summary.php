<?php
	
	//get summary data from the database
	$q1 = "select summary_title, summary_LSA, summary_graph from summaries where summary_id = '$summ_id'";
	$r = mysqli_query($con, $q1);
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	
	$summary_title = $row['summary_title'];
	$summary_LSA = $row['summary_LSA'];
	$summary_graph = $row['summary_graph'];
	
	//get the sources from the database
	$q2 = "select domain, url, title from sources where summary_id = '$summ_id'";
	$r = mysqli_query($con, $q2);
		
	$sources = array();
	
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
	{						
		$sources[] = $row;
	}

	//close connection
	mysqli_close($con);
?>