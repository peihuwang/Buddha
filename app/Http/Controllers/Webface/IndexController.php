<?php

class IndexController{
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
	

	
}