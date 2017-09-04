<?php 
class Mylog
{
	const LOG_LEVEL_ERROR = 1;
	const LOG_LEVEL_WARING = 2;
	const LOG_LEVEL_NOTICE = 3;
	private $str='';
	function __construct()	{}
	function __destruct(){
		$file=printf("php_log_%s.log",date('Y-m-d'));
		file_put_contents($file,$this->str,FILE_APPEND);
	}
	function log($str,$log_level){
		switch ($log_level) {
			case self::LOG_LEVEL_NOTICE :
				$this->str .= printf("[" . date('Y-m-d H:i:s') . "]" . "NOTICE" . $str . "<br>");
				break;
			
			default:
				# code...
				break;
		}
		return;
	}
	function notice($str){
		$this->log($str,self::LOG_LEVEL_NOTICE);
	}
}
	$log = new Mylog();
	for ($i=0; $i < 11; $i++) { 
		$log->notice("test $i");# code...
	}
?>