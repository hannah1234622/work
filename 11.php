<meta charset="utf-8" />
<?php
// $a=array(
// '0' => array('id'=>1,'pid'=>0,'name'=>'水果'),
// '1' => array('id'=>2,'pid'=>0,'name'=>'蔬菜'),
// '2' => array('id'=>3,'pid'=>1,'name'=>'食品'),
// '3' => array('id'=>4,'pid'=>2,'name'=>'運動'),
// '4' => array('id'=>5,'pid'=>1,'name'=>'電腦'),
// '5' => array('id'=>6,'pid'=>'香果','name'=>'香蕉'),
// '6' => array('id'=>7,'pid'=>4,'name'=>'牛奶'),
// '7' => array('id'=>8,'pid'=>5,'name'=>'西瓜'),
// '8' => array('id'=>9,'pid'=>7,'name'=>'蘋果'),
// );

$a = array(  
    2 => array(  
        'catid' => 2,  
        'catdir' => 'notice',  
    ),  
    5 => array(  
        'catid' => 5,  
        'catdir' => 'subject',  
    ),  
    6=> array(  
        'catid' => 6,  
        'catdir' => 'news'  
    ),  
);  
$keywords="tice";

function search($a,$keywords) {
  $arr=$result=array();
	foreach ($a as $key => $value) {
		foreach ($value as $valu) {
				if(strstr($valu, $keywords)){ 
					array_push($arr, $key);
				} 
		} 
	}
	foreach ($arr as $key => $value) {
				if(array_key_exists($value,$a)){
					 array_push($result, $a[$value]);
				}
	}
  return $result; 
}
var_dump(search($a,$keywords));



//print_r($arr);
?>