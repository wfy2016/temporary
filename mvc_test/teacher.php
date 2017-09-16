<?php
	/**
	* 定义一个“教师类”，并由此类实例化两个“教师对象”。该类至少包括3个属性，3个方法，其中有个方法是“自我介绍”，就能够把自身的所有信息显示出来。
	*/
	class ClassTeacher 
	{
		public $name;
		public $course;
		public $rank;
		public function self_introduce()
		{
			echo "Hi,i`m your techer " . $this->name . ",a " . $this->rank . " teacher." . "\n";# code...
			echo "I will teach your " . $this->course . " class.\n";
		}
		public function set_message($name,$course,$rank){
			$this->name=$name;
			$this->course=$course;
			$this->rank=$rank;
		}
		public function say_hi(){
			echo "HI!\n";
		}
	}

	$teacher_a=new ClassTeacher();
	$teacher_a->set_message("Tom","math","senior");
	$teacher_a->self_introduce();
	$teacher_a->say_hi();

	$teacher_b=new ClassTeacher();
	$teacher_b->set_message("Jom","physics","junior");
	$teacher_b->self_introduce();
	$teacher_b->say_hi();
?>
