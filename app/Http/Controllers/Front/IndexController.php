<?php

/**
 * Class IndexController
 */
class IndexController extends Buddha_App_Action{

	public function __construct(){
		parent::__construct();
		$this->classname=__CLASS__;


	}
	
public function index(){




	//print_r(Buddha::getInstance());
//print_r(Buddha_Log_Csv::getInstance(Buddha_Log_Csvadapter::getInstance("404:Not Found")));
    //Buddha_Log_Csv::getInstance(Buddha_Log_Csvadapter::getInstance("404:Not Found"))->write();
//	Buddha_Log_Console::getInstance(Buddha_Log_Csvadapter::getInstance("404:Not Found"))->write();

/*
	$error=new  Buddha_Log_Csvadapter("404:Not Found");
	$log = new Buddha_Log_Csv($error);
	$log->write();
*/

	/*
$this->db->insert("account", array(
		"user_name" => "foo",
		"email" => "foo@bar.com",
		"type" => "business",
		"age" => "152"
));
*/

$TPL_URL = __FUNCTION__;


$_COOKIE["lang"]=isset($_REQUEST['lang'])?$_REQUEST['lang']:''
		;


	$this->smarty->assign('subject', "标题");

$welcome = "Welcome To My Brain Program";
$this->smarty->assign('welcome', $welcome);


$this->smarty -> display($TPL_URL.'.html');
	
	}
	public static function getClassName(){
		return __CLASS__;
	}

	public  function phpinfo(){
		echo phpinfo();
	}

	
}