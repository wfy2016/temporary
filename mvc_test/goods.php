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
		public $name;
		public $price;
		public $stock;

		public function self_introduce()
		{
			echo "The unit price of " . $this->name ." is " . $this->price . " .\n";# code...
		}
	}

	/**
	* 
	*/
	class ClassGoodsPhone extends ClassGoods
	{
		public $brand;
		public $producing_place;
		public function self_introduce()
		{
			echo "The unit price of " . $this->name ." is " . $this->price . " .\n";# code...
			echo $this->name . " `s brand is " . $this->brand . ",it`s producing_place is " . $this->producing_place . ".\n"; 
		}
	}

	class ClassGoodsBook extends ClassGoods
	{
		public $auther;
		public $press;
		public function self_introduce()
		{
			echo "The unit price of " . $this->name ." is " . $this->price . " .\n";# code...
			echo $this->name . " `s auther is " . $this->auther . ",it`s press is " . $this->press . ".\n"; 
		}
	}

	$phone = new ClassGoodsPhone();

	$phone->name="Huawei P10";
	$phone->price="3299";
	$phone->stock="99";
	$phone->brand="Huawei";
	$phone->producing_place="Shenzhen";

	$phone->self_introduce();




	$book = new ClassGoodsBook();

	$book->name="computer system";
	$book->price="19";
	$book->stock="10";
	$book->auther="linui";
	$book->press="Sage Publications";

	$book->self_introduce();

?>