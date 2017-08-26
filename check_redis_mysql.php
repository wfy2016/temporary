<?php 
	$link = mysql_connect('rm-uf66op2zv2435fr6zo.mysql.rds.aliyuncs.com', 'root', 'WFY5714lxgk=3n');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	echo 'Connected successfully.' . '<br />';
	mysql_close($link);
?>