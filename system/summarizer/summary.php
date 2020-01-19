<!doctype html>
<?php
	session_start();
	$summ_id = $_GET['summary'];
	
	//connect to database
	require_once('../../summarizer_filesystem/php/sql_connect.php');

	//if connection fails
	if(!$con)
	{
		//read the data directly from the json file
		include('../../summarizer_filesystem/php/get_summary_json.php');			
	}
	//if connection is set
	else
	{
		$con->query("SET NAMES 'utf8'");
		//read the data from the database
		include('../../summarizer_filesystem/php/get_summary.php');
	}

?>

<html>
	<head>
		<meta charset = "utf-8"/>
		<title>Summarized News: <?php echo $summary_title; ?></title>
		<link rel="stylesheet" href="scripts/css/summary.css">
		<link rel="stylesheet" href="scripts/css/main.css">
	</head>

	<body>
		
		<a href="index.php" style="text-decoration:none;">
			<h1>Summarized News</h1>
		</a>
		
		<div id="content" summ_id="<?php echo $summ_id; ?>">
			
			<!-- Display the two summaries -->
			<article class="summaries">
			
				<h2 id="summary_title"><?php echo $summary_title; ?></h2>
			
				<h4>LSA-based Summary</h4>
				<p id="summary_LSA"><?php echo $summary_LSA; ?></p>
				
				<h4>Graph-based Summary</h4>
				<p id="summary_graph"><?php echo $summary_graph; ?></p>
				
			</article>
			
			<!-- Display list of sources -->
			<div id="sources">
				<h4>Sources</h4>
				<ul>
					<?php
						foreach ($sources as $source)
						{
							echo '<li>'.$source['domain'].'</br><a href = "'.$source['url'].'">'.$source['title'].'</a></li>';
						}
					?>
				</ul>
			</div>
		</div>
		
	</body>
</html>