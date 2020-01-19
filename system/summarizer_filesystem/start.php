<?php

	//path to python
	$python = 'C:\\Users\\kappa\\AppData\\Local\\Programs\\Python\\Python37-32\\python.exe';
	
	$cd = dirname(__FILE__);
	
	//paths to python scripts
	$py_backup = $cd.'/scripts/py/util/backup.py';
	$py_clean = $cd.'/scripts/py/clean.py';
	$py_cluster = $cd.'/scripts/py/clustering.py';
	$py_summarize = $cd.'/scripts/py/summarize.py';
	$py_savetoDB = $cd.'/scripts/py/util/savetoDB.py';
	
	//backup files
	$cmd = "$python $py_backup";
	exec("$cmd", $output);
	
	//run crawler
	chdir($cd.'/scripts/py/crawler/');
	$command = escapeshellcmd($python.' -m scrapy.cmdline runspider crawler/spiders/rss_crawler.py');
	shell_exec($command);
	
	chdir($cd.'/../../../');
	//clean articles
	$cmd = "$python $py_clean";
	exec("$cmd", $output);	
	
	//cluster dataset
	$cmd = "$python $py_cluster";
	exec("$cmd", $output);
	
	//summarize
	$cmd = "$python $py_summarize";
	exec("$cmd", $output);
	
	//save summaries to database
	$cmd = "$python $py_savetoDB";
	exec("$cmd", $output);

?>
