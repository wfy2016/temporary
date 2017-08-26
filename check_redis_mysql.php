<?php 
	$link = mysql_connect('rm-uf66op2zv2435fr6zo.mysql.rds.aliyuncs.com', 'root', 'WFY5714lxgk=3n');
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	echo "Connected successfully.\n";

	$db_selected = mysql_select_db('nail', $link);
	if (!$db_selected) {
	    die ('Can\'t use foo : ' . mysql_error());
	}
	$query = "SELECT COUNT(*) FROM na_user";
	// 执行查询
	$result = mysql_query($query);

	// 检查结果
	// 下面显示了实际发送给 MySQL 的查询，以及出现的错误。这对调试很有帮助。
	if (!$result) {
	    $message  = 'Invalid query: ' . mysql_error() . "\n";
	    $message .= 'Whole query: ' . $query;
	    die($message);
	}
	$row = mysql_fetch_array($result);
	#var_dump($row);
        printf ("count is %s", $row[0]);
	mysql_free_result($result);
	mysql_close($link);
?>
