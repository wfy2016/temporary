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
    $mysql_user_count = $row[0];
    //从redis中读取寻找好友列表
   $redis = new Redis();
   $redis->connect('127.0.0.1', 6379);
   $arList = $redis->keys("friend_open_mes_*");
   $redis_user_count = count($arList);
   if($mysql_user_count > $redis_user_count){
   		$get_from_mysql_to_redis = $mysql_user_count - $redis_user_count;
   		//从mysql中取id最大的 $get_from_mysql_to_redis个数据 到redis
   		// $query = "select * from (select t1.*,t2.nickname from na_user_nail as t1 left join na_user as t2 on t1.Nail_id=t2.id) as s order by desc limit ";
   		$query = sprintf("select * from (select t1.*,t2.nickname from na_user_nail as t1 left join na_user as t2 on t1.Nail_id=t2.id) as s order by id desc limit %s",$get_from_mysql_to_redis);
   		$result = mysql_query($query);
   		// 检查结果
		// 下面显示了实际发送给 MySQL 的查询，以及出现的错误。这对调试很有帮助。
		if (!$result) {
		    $message  = 'Invalid query: ' . mysql_error() . "\n";
		    $message .= 'Whole query: ' . $query;
		    die($message);
		}
		$row = mysql_fetch_array($result);
		//每个数组按照id添加redis,例如id=10,redis命名为friend_open_mes_10
		$func = function($value) use($redis){
			$redis_name='friend_open_mes_' . $value['id'];
			$redis->hMset($redis_name,$value);
		};
		array_map($func, $row);
		// var_dump($row);
   }
	mysql_free_result($result);
	mysql_close($link);
	echo 'ok';
?>
