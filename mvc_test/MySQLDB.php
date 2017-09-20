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

		self::$link=mysql_connect("{$this->host}:{$this->port}",$this->user,$this->pass);
		mysql_query("set names $this->charset");
		mysql_query("use $this->dbname");
	}
	function select_all(){
		$query="select * from mysqldb_name";
		$result = mysql_query($query);

		if (!$result) {
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query . "\n";
			die($message);
		}


		while ($row = mysql_fetch_assoc($result)) {
			echo $row['name'];
			echo $row['id'];

		}

		mysql_free_result($result);
	}
	static function mysql_init($host,$port,$user,$pass,$dbname,$charset){
		if(empty(self::$link)){
			//new一个对象
			self::$link=new self($host,$port,$user,$pass,$dbname,$charset);
		}
		return self::$link;

	}
}
$object=ClassMySQLDB::mysql_init("","","","","","");
$object->select_all();
?>
