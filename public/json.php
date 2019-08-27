<?php
class Cat{
public $name;
//public function __construct() {
// $this->name = $name;
//}
	public function input($cityID){
		$this->name = $cityID;
	}
}
 
class Data{
	public $code;
	public $data;
	public function input($de,$da){
		$this->code = $de;
		$this->data = $da;
}
 
}
	$arrays=array();
	$cat1=new Cat();
	$cat1->input("Tom1") ;
	array_push($arrays,$cat1);
	$cat2=new Cat();
	$cat2->input("Tom2") ;
	array_push($arrays,$cat2);
	$cat3=new Cat();
	$cat3->input("Tom3");
	
	array_push($arrays,$cat3);
	$data=new Data();
	$data->input("200",$arrays);
	//$ary=array($cat1,$cat2,$cat3);
	echo "<br/>";
	//echo implode(",",$ary);
	//echo json_encode($arrays);
	echo json_encode($data);
	$re = '{"code":"200","data":[{"name":"Tom1"},{"name":"Tom2"},{"name":"Tom3"}]}';
	echo $re;
	
 
?>