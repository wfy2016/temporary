<?php 
	class ClassMySQLDB {

		private static $link=null;

		private $host;
		private $port;
		private $user;
		private $pass;
		private $dbname;
		private $charset;

		private function __construct($host,$port,$user,$pass,$dbname,$charset){
			$this->host=$host?$host:"rm-uf66op2zv2435fr6zo.mysql.rds.aliyuncs.com";
			$this->port=$port?$port:"3306";
			$this->user=$user?$user:"root";
			$this->pass=$pass?$pass:"WFY5714lxgk=3n";
			$this->dbname=$dbname?$dbname:"mysqldb";
			$this->charset=$charset?$charset:"utf8";

			self::$link=mysql_connect($host:$port,$user,$pass);
			mysql_query("set names $charset");
			mysql_query("use $dbname");
		}
		function select_all(){
			mysql_query("select * from $this->dbname");
		}
		static function mysql_init(){
			if(empty(self::$link)){
				//new一个对象
				self::$link=new self($host,$port,$user,$pass,$dbname,$charset);
			}else{
				return self::$link;
			}
		}
	}
	$object=ClassMySQLDB::mysql_init();
	$object->select_all();
?>