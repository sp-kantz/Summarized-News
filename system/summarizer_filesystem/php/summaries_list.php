<?php
	
	//get summaries' titles and ids from the database
	$q = "select summary_id, summary_title from summaries";
	$r = mysqli_query($con, $q);
	
	$summaries = array();
	
	while($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
	{						
		$summaries[] = $row;
	}

	//close connection
	mysqli_close($con);
?>