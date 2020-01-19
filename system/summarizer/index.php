<!doctype html>
<?php
	session_start();
	
	//connect to database
	require_once('../../summarizer_filesystem/php/sql_connect.php');

	//if connection fails
	if(!$con)
	{
		//read the data directly from the json file
		include('../../summarizer_filesystem/php/summaries_list_json.php');			
	}
	//if connection is set
	else
	{
		$con->query("SET NAMES 'utf8'");
		//read the data from the database
		include('../../summarizer_filesystem/php/summaries_list.php');
	}
?>

<html>
	<head>
		<meta charset="utf-8"/>
		<title>Summarized News</title>
		<script src="scripts/js/button.js"></script>
		<link rel="stylesheet" href="scripts/css/main.css">
		<link rel="stylesheet" href="scripts/css/index.css">
	</head>

	<body>
		
		<div id="header">
			<a href="index.php" style="text-decoration:none;">
				<h1>Summarized News</h1>
			</a>
		</div>
		
		<!-- 
		<div>
			<form>
				<input type="submit" id="startButton" value="Start the Process" onclick="start()">
			</form>
		</div>
		-->
		
		<div id="content" class="content">
			<?php
				foreach ($summaries as $summary)
				{
					echo '<div class="entry">
							<a class="entry_link" href="summary.php?summary='.$summary['summary_id'].'">
								<div class="summary_entry">'.$summary['summary_title'].' </div>
							</a>
						</div>';
				}
			?>
		</div>
			
	</body>	
</html>