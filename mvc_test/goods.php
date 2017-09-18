<?php 
	/**
	* 设计如下几个类：
		商品类，有名称，有价钱，库存数，可显示自身信息（名称，价钱）。
		手机类，是商品的一种，并且有品牌，有产地，可显示自身信息。
		图书类，是商品的一种，有作者，有出版社， 可显示自身信息。
		创建一个手机对象，并显示其自身信息；
		创建一个图书对象，并显示其自身信息；
		扩展要求：尽量体现封装性就更好了。
	*/
	class ClassGoods
	{
		protected $name;
		protected $price;
		protected $stock;

		protected function __construct($name,$price,$stock){
			$this->name=$name;
			$this->price=$price;
			$this->stock=$stock;
		}
		protected function self_introduce()
		{
			echo "The unit price of " . $this->name ." is " . $this->price . " .\n";# code...
		}

	}

	/**
	* 
	*/
	class ClassGoodsPhone extends ClassGoods
	{
		protected $brand;
		protected $producing_place;
		function __construct($name,$price,$stock,$brand,$producing_place){
			parent::__construct($name,$price,$stock);
			$this->brand=$brand;
			$this->producing_place=$producing_place;
		}
		public function self_introduce()
		{
			parent::self_introduce();
			// echo "The unit price of " . $this->name ." is " . $this->price . " .\n";# code...
			echo $this->name . " `s brand is " . $this->brand . ",it`s producing_place is " . $this->producing_place . ".\n"; 
		}
	}

	class ClassGoodsBook extends ClassGoods
	{
		protected $auther;
		protected $press;

		 function __construct($name,$price,$stock,$auther,$press){
			parent::__construct($name,$price,$stock);
			$this->auther=$auther;
			$this->press=$press;
		}
		 function self_introduce()
		
		{
			parent::self_introduce();
			// echo "The unit price of " . $this->name ." is " . $this->price . " .\n";# code...
			echo $this->name . " `s auther is " . $this->auther . ",it`s press is " . $this->press . ".\n"; 
		}
	}

	$phone = new ClassGoodsPhone("Huawei P10","3299","99","Huawei","Shenzhen");

	// $phone->name="Huawei P10";
	// $phone->price="3299";
	// $phone->stock="99";
	// $phone->brand="Huawei";
	// $phone->producing_place="Shenzhen";

	$phone->self_introduce();



	$book = new ClassGoodsBook("computer system","19","10","linui","Sage Publications");

	// $book->name="computer system";
	// $book->price="19";
	// $book->stock="10";
	// $book->auther="linui";
	// $book->press="Sage Publications";

	$book->self_introduce();

?>
