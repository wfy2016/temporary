<?php 
	/**
	* 定义一个“学生类”，并由此类实例化两个“学生对象”。该类包括姓名，性别，年龄等基本信息，并至少包括一个静态属性（表示总学生数）和一个常量，以及包括构造方法和析构方法。该对象还可以调用一个方法来进行“自我介绍”（显示其中的所有属性）。构造方法可以自动初始化一个学生的基本信息，并显示“ｘｘ加入传智，当前有xx个学生”。
	*/
	class ClassStudent
	{
		public $name;
		public $gender;
		public $age;
		static $student_num=0;
		const recording_time="2017-9-16 19:11";
		function __construct($arg_name,$arg_gender,$arg_age)
		{
			$this->name=$arg_name;# code...
			$this->gender=$arg_gender;
			$this->age=$arg_age;
			self::$student_num++;
			echo $this->name . "join us,now there are " . self::$student_num . " students\n";
		}
		function self_introduce(){
			echo "My name is " . $this->name . " a " . $this->age . " years old" . $this->gender . "\n";
		}
		function __destruct(){
			echo $this->name . " have been destroyed.\n";
		}
	}

	$student_a=new ClassStudent("Ada","girl","17");
	$student_a->self_introduce();
	$student_b=new ClassStudent("Jom","boy","18");
	$student_b->self_introduce();
?>
