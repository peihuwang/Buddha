<?php

class ApptokenController{
	protected $db; 
	protected $prefix;
	protected $smarty;	
    public function __construct($mysql,$smarty){  
       $this->db=$mysql;
	   $this->prefix=$mysql->getPrefix();
	   $this->smarty=$smarty;
      }

	
public function index(){


$TPL_URL = __FUNCTION__;	


	}
public function gettoken(){
	global $param;
//http://piaowu.com/webface/?Services=apptoken.gettoken&ip=127.0.0.1&starttime=1480591454&appvalue=webface&key=LetMeToTest&sign=19935a99cfc5a04872ff5dd7ca64a0f3
//Array ( [appvalue] => webface [ip] => 127.0.0.1 [key] => LetMeToTest [starttime] => 1480591454 )

// sige= md5(webface127.0.0.1LetMeToTest1480591454)=19935a99cfc5a04872ff5dd7ca64a0f3
// sige= 把appvalue的值 拼接ip的值 拼接key的值 拼接starttime的值 得到的最终字符串再进行md5加密 得到的字符串就是签名sige的值
/*

access_token =b88f9603be8be14e66a2b204fa15e7f5
http://piaowu.com/webface/?Services=apptoken.gettoken&ip=127.0.0.1&starttime=1480591454&appvalue=wphwebfacetest&key=wphtest&sign=41a6efb906c2e3f4600228944c00b021


 */

if(!isset($param['param']['ip'])
or !isset($param['param']['starttime'])
or !isset($param['param']['appvalue'])
or !isset($param['param']['key'])
or !isset($param['param']['sign'])
){

make_json_result(null,'/webface/?Services='.$param['param']['Services'],4444,'info need input');
}

	$ip = $param['param']['ip'];
	$starttime = $param['param']['starttime'];
	$appvalue = $param['param']['appvalue'];
	$key = $param['param']['key'];

	$signarr = array('ip'=>$ip,'starttime'=>$starttime,'appvalue'=>$appvalue,'key'=>$key);
	ksort($signarr);

	$signarr = array_values($signarr);
	$mysign = $signarr[0].$signarr[1].$signarr[2].$signarr[3];
	$sign= md5($mysign);


	if($param['param']['sign']==$sign){
		$access_token= md5(getRandom(32));
		$endtime=$starttime+24*3600;
		$jsondata['access_token'] =$access_token;

		$apptoken = new Apptoken($this->db);
		$visit_count = $apptoken->edit($ip,$key,$starttime,$endtime,$access_token);
		$jsondata['visit_count'] =$visit_count;
		make_json_result($jsondata,'/webface/?Services='.$param['param']['Services'],0,'get token');
	}else{
		make_json_result(null,'/webface/?Services='.$param['param']['Services'],40002,'签名错误');
	}



}
	

	
}